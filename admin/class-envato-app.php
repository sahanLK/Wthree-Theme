<?php


//Do not access directly this file
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct File Access Denied' );
}


class Wthree_envato_api {
    
    private $product_id;
    private $token;
    
    //Set the token
    public function set_token( $token ) {
        $this -> token = $token;
    }
    
    //set the Product ID
    public function set_product_id( $product_id ) {
        $this -> product_id = $product_id;
    }
    
    public function request_from_envato( $url ) {
        
        $args = array(
            'headers' => array(
                'Authorization' => 'Bearer'. esc_attr( $this -> token ),
                'User-Agent'    => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0',
            ),
            
            'timeout'           => 20,
            'headers_data'      => false,
        );
        
        //Check if API Token is empty
        if ( empty( $this -> token ) ) {
            return new WP_Error( 'API token error', esc_html__( 'API token is required', 'wthree' ) );
        }
        
        //Make an API Request
        $response = wp_remote_get( esc_url_raw( $url ), $args );
        
        //Check the response Code and Message
        $response_code = wp_remote_retrieve_response_code( $response );
        $response_msg = wp_remote_retrieve_response_message( $response );
        
        
        if ( empty( $response_code ) && is_wp_error( $response ) ) {
            return $response;
        }
         
        if ( 200 !== $response_code  && empty( $response_msg ) ) {
            return new WP_Error( $response_code, $response_msg );
        }
        
        if ( 200 !== $response_code ) {
            return new WP_Error( $response_code, esc_html__( 'An Unknown API error occured', 'wthree' ) );
        }
        
        $body_data = json_decode( wp_remote_retrive_body( $response ), true );
        
        if ( null !== $body_data ) {
            return new WP_Error( 'api_error', esc_html__( 'An Unknown API error occured', 'wthree' ) );
        }
        
        return array(
            'response_code' =>  $response_code,
            'response_msg'  =>  $response_msg,
            'data'          =>  $body_data,
        );
    }
    
    
    public function check_is_envato_author() {
        
        $author_check_url = 'https://api.envato.com/whoami';
        $stat = $this -> request_from_envato( $author_check_url );
		return $stat;
        
    }
    
    
    public function is_theme_purchase() {
        
        if ( empty( $this -> $product_id ) ) {
            return new WP_Error( 'product_id_error', esc_html__( 'Product ID is required.', 'wthree' ) );
        }
        
        $purchase_check_url = 'https://api.envato.com/v2/market/buyer/download?item_id='. esc_attr( $this->product_id ) .'&shorten_url=true';
		$stat = $this -> request_from_envato( $purchase_check_url );
		return $stat;
    }
    
    
    public function verify_purchase() {
        
        if ( isset( $_POST[ 'user_token' ] ) && !empty( $_POST[ 'user_token' ] ) ) {
            $product_id = '25116823';
            $token = sanitize_text_field( $_POST[ 'user_token' ] );
            
            $this -> set_product_id( $product_id );
            $this -> set_token( $token );
            
            $author_verify = $this -> check_is_envato_author();
            $temp_stat = '';
            
            if ( ! is_wp_error( $author_verify ) ) {
                echo 'Author Verified Successfully';
                $purchase_verify = $this -> check_is_theme_purchase();
                if ( ! is_wp_error( $purchase_verify ) ) {
                    if ( isset( $purchase_verify['data'] ) && !empty( $author_verify['data'] ) ) {
                        update_option( 'verified_purchase_status', 1 );
                        updte_option( 'verified_purchase_data', $author_verify['data'] );
                        update_option( 'verified_token', $token );
                        return $token;
                    } else {
                        echo 'unknown error';
                        $temp_stat = 'invalid';
                    }
                } else {
                    echo 'Purchase Verification error.';
                    $temp_stat = 'invalid';
                }
                
            } else {
                echo 'Could not verify the Author';
                $temp_stat = 'invalid';
            }
            
            if ( $temp_stat == 'invalid' ) {
                update_option( 'verified_purchase_status', '' );
                update_option( 'verified_purchase_data', '' );
                update_option( 'verified_token', '' );
                return 'invalid';
            }
            
        } else {
            $verified_stat = get_option( 'verified_purchase_status' );
            $verified_data = get_option( 'verified_purchase_data' );
            
            if ( $verified_stat == 1 && !empty( $verified_data ) ) {
                $token = get_option( 'verified_token' );
                return $token;
            } else {
                echo 'Please Enter Token';
            }
        }
        
        return false;
        
    }
}

?>