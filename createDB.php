<?php

  /*------------------------------------------- open a connection --------------------- */
 include"connect.php";

  /*---------------------------------------- create the product table -----------------*/
  $query=mysqli_query($conn,"create table product (p_id int auto_increment not null primary key ,
                                            p_name text not null,
                                            p_price_egp float,
                                            p_price_dollar float,
                                            p_price_bitcoins float,
                                            p_image  text,
                                            p_video  text,
                                            p_sales int ,
                                            p_description text
                                          );");

/*---------------------------------------- create the customer table -----------------*/
$query=mysqli_query($conn,"create table customer (
                                       c_id int auto_increment not null primary key
                                       c_fullname text not null,
                                       c_email text not null ,
                                       c_phone text,
                                       c_address text,
                                       c_active int
                                       );");


    /*----------------------------------------- create the OrderTable table  ------------- */
  $query=mysqli_query($conn,"create table orderTable(
                                             o_id int auto_increment not null primary key ,
                                             c_id  int ,
                                             o_cost  float ,
                                             o_payment_type text,
                                             o_date  timestamp,
                                             foreign key (c_id) references customer (c_id)
                                             ) ;");
    /*----------------------------------------- create the OrderItems table  ------------- */
     $query=mysqli_query($conn,"create table orderItems(
                                                 o_id int ,
                                                 p_id int ,
                                                 p_quantity int,
                                                 foreign key (o_id) references customer (o_id) ,
                                                 foreign key (p_id) references customer (p_id)
                                                ) ;");

     /*---------------------------------------- create the admin table -----------------*/
  $query=mysqli_query($conn,"create table admin (a_id int auto_increment not null primary key ,
                                            a_name text not null,
                                            a_username text,
                                            a_password text
                                          );");

?>