<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('random')){
   function random(){
         $number = rand(1111,9999);
         return $number;
       }
   }
 
if ( ! function_exists('current_utc_date_time')){
   function current_utc_date_time(){
         $dateTime = gmdate("Y-m-d\TH:i:s\Z");;
         return $dateTime;
       }
   }   

   if ( ! function_exists('message')){
     function message($status,$success_msg,$failed_msg){
      if($status==true)
      {
      $this->session->set_flashdata('success', $success_msg); 
     }
     else{
      $this->session->set_flashdata('error', $failed_msg); 
     }
   }
 }   

