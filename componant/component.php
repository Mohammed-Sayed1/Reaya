<?php

function component($productname, $productprice,$productdescription, $productimg, $productid){
    $element = "

    
    <div class=\"col-lg-3 col-md-6 col-sm-12 my-3 my-md-0\">
                <form action=\"pharmacies.php\" method=\"post\">
                    <div class=\"card shadow productcard\">

                    <style>.productcard {
                        margin-bottom: 20px;
                        
                    }</style>
                        <div  class=\"fairy\">
                            <img src=\"upload\\$productimg\" alt=\"Image1\" height=\"50 px\"   class=\"img-fluid card-img-top\" >
                          
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
        
                            <p class=\"card-text\">
                                $productdescription
                            </p>
                            <h5>
                                <span class=\"price\">$productprice LE</span>
                            </h5>
                            <button type=\"submit\" class=\"productCardBtn btn-warning button d-flex my-3\" name=\"add\">Add to Cart <i class=\"productIcon fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>

                             
                        </div>
                    </div>
                </form>
                <style>
                .productCardBtn{


                    display: inline-block;
                    font-weight: 400;
                    color: #212529;
                    text-align: center;
                    vertical-align: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    background-color: #009efb;
color: #fff;
                    border: 1px solid #009efb;
                    padding: 0.375rem 0.75rem;
                    font-size: 1rem;
                    line-height: 1.5;
                    border-radius: 0.25rem;
                    transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                }

                .productIcon{

                    color: #f0f8ff;

                }
                
                </style>

            </div>
    ";
    echo $element;
}


function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                            <img src=\"upload\\$productimg\" alt=\"Image1\" height=\"100\"   class=\"img-fluid card-img-top\" >

                                
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                <small class=\"text-secondary\">Seller: dailytuition</small>
                                <h5 class=\"pt-2\">$productprice LE</h5>
                                <button type=\"submit\" class=\" button_fel\">Save for Later</button>
                                <button type=\"submit\" class=\"button_fel\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}
function doctorsCard($doctorname, $price,$specialization,$doctordescription,$adress,$doctorimg,$doctorid){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"booking.php?addbooking=$doctorid\" method=\"post\">
                    <div class=\"card shadow doctorcard\">
                        <div>

                        <style>.doctorcard {
                            margin-bottom: 20px;

                        }</style>
                        <div class='docimg'>
                            <img src=\"upload\\$doctorimg\" alt=\"Image1\" height=\"100\"   class=\"img-fluid card-img-top\" >
                          </div>
                        </div>
                        <div class=\"card-body doccardbody\">

                        <style>
.docimg{

    width: 100%;
    height: 300px;
}
       .docimg img{

        width:100%;
        height:100%;
       }                 
                        .doccardbody{
                            align-content: start;

                            
                        }
                        </style>
                            <h5 class=\"card-title\">Dr $doctorname</h5>
                            <h6 class=\"card-title\">Spicialization : $specialization</h6>
                            <h6 class=\"card-title\"><i class=\"fa-sharp fa-solid fa-location-dot\"></i> $adress</h6>
                            <p class=\"card-text\">
                            <i class=\"fa-solid fa-notes-medical\"></i> $doctordescription
                            </p>


                            <h6>
                                <span class=\"price\"><i class=\"fa-solid fa-money-bill-transfer\"></i> $price LE</span>

                            </h6>
                            <button  href=\"booking.php?addbooking=
                            \"              type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Book Now <i class=\"fas  fa-solid fa-calendar-days\"></i></button>


                       
                        </div>
                    </div>
                </form>

                
            </div>
    ";
    echo $element;
}