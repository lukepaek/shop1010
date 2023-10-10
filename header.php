        <?php
            include 'header/TopHeader.php'; 
            include 'modal/quickview_form.php';
            include 'account/login.php';
            include 'account/Register.php';
        ?>

        <div id="mini_cart"></div>
        <div id="Item_List"></div>
        
        <script>

            var loginas = '';
            function GetIPAddress()
            {
                $.getJSON("https://api.ipify.org?format=json", function(data) {
                    var ip = data.ip;
                    $.ajax({
                        type:'POST',
                        url:'Account/LoginAs.php',
                        data:'LoginAs='+ip,
                        success:function(msg){
                            loginas = msg;
                            MyAccount(loginas);
                        }
                    });
                })
            }

            function LoadingCart(Flag)
            {
                if(Flag=='Y'){GetIPAddress();}

                $.ajax({
                    type:'POST',
                    url:'Cart/LoadingCart.php',
                    success:function(msg){
                        document.getElementById("mini_cart").innerHTML = msg;
                        TotalCart('N');

                        if(Flag=='Y'){
                            $.ajax({
                                type:'POST',
                                url:'Products/PageChecking.php', //Check Index Page
                                success:function(msg){
                                    if(msg=='Index'){
                                        SelectCountry("ALL");
                                    }
                                }
                            });
                        }
                    }
                });
            }

            function TotalCart(Remove)
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/TotalCart.php',
                    data:'Remove='+Remove,
                    success:function(msg){
                        var cart_qty = '<a data-cart-items="' + msg + '" style="padding-top: 10px;"></a>';
                        document.getElementById("cart_qty").innerHTML = cart_qty;
                        document.getElementById("total_cartqty").innerHTML = 'Your Cart (' + msg + ')';
                        
                    }
                });
            }

            function RemoveCart(id, category)
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/RemoveCart.php',
                    data:'id='+id+'&email='+loginas,
                    success:function(msg){
                        if(msg.trim()=='Y')
                        {   
                            if(category.trim()=='CartsTable'){
                                CartsTableRemove(id);
                            }

                            CartRemove(id,1);

                            var row = document.getElementById('li' + id);
                            if(row){row.remove();}

                            var rows = document.getElementById('li_cartstable_' + id);
                            if(rows){rows.remove();}

                            TotalCart('Y');
                        }
                    }
                });
            }

            function AddToCart(id, status_desc, qty, loading)
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/AddToCart.php',
                    data:'id='+id+'&email='+loginas+'&status_desc='+status_desc+'&qty='+qty,
                    success:function(msg){
                        if(msg.trim()=='Y')
                        {
                            if(loading == 1){LoadingCart('N'); }
                        }
                    }
                });
            }

            function CartMinus(id)
            {
                
                var txt_qty = $('#txt_qty' + id).val();
                txt_qty = (txt_qty * 1) - 1;
                if(txt_qty < 1) {return false;}
                $('#txt_qty' + id).val(txt_qty);

                var txt_price = $('#txt_price' + id).val();
                var txt_subtotal = $('#txt_subtotal').val();

                txt_subtotal = parseFloat((txt_subtotal * 1) - (txt_price * 1)).toFixed(2); 
                $('#txt_subtotal').val(txt_subtotal);
                $('#sub_total').html('$' + txt_subtotal);

                var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                $('#tax').html('$' + tax);

                var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                $('#total').html('$' + total);
                
                AddToCart(id,'Cart',-1,0);
            }

            function CartPlus(id)
            {
                var txt_qty = $('#txt_qty' + id).val();
                txt_qty = (txt_qty * 1) + 1;
                $('#txt_qty' + id).val(txt_qty);

                var txt_price = $('#txt_price' + id).val();
                var txt_subtotal = $('#txt_subtotal').val();

                txt_subtotal = parseFloat((txt_subtotal * 1) + (txt_price * 1)).toFixed(2); 
                $('#txt_subtotal').val(txt_subtotal);
                $('#sub_total').html('$' + txt_subtotal);

                var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                $('#tax').html('$' + tax);

                var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                $('#total').html('$' + total);

                AddToCart(id,'Cart',1,0);
            }

            function CartRemove(id, RemovePage)
            {
                if(RemovePage == 1)
                {
                    var txt_qty = $('#txt_qty' + id).val();
                    var txt_price = $('#txt_price' + id).val();

                    var amount = (txt_qty * 1) * (txt_price * 1);

                    var txt_subtotal = $('#txt_subtotal').val();

                    txt_subtotal = parseFloat((txt_subtotal * 1) - (amount * 1)).toFixed(2); 
                    $('#txt_subtotal').val(txt_subtotal);
                    $('#sub_total').html('$' + txt_subtotal);

                    var tax = parseFloat(txt_subtotal * 0.1).toFixed(2); 
                    $('#tax').html('$' + tax);

                    var total = parseFloat((txt_subtotal * 1.1)).toFixed(2); 
                    $('#total').html('$' + total);
                }

            }

            function QuickView(id)
            {
                $.ajax({
                    type:'POST',
                    url:'Modal/QuickView.php',
                    data:'id='+id,
                    success:function(msg){
                        document.getElementById("quick_view").innerHTML = msg;
                        TotalCart('N');
                    }
                });
            }

            function DetailItem(urls)
            {
                window.open(urls,'_blank');
            }

            function WatchList(id)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList.php',
                    data:'&email='+loginas,
                    success:function(msg){
                        document.getElementById("Item_List").innerHTML = msg;
                    }
                });
            }
            
            function WatchPlus(id)
            {
                var txt_wqty = $('#txt_wqty_' + id).val();
                txt_wqty = (txt_wqty * 1) + 1;
                $('#txt_wqty_' + id).val(txt_wqty);
                WatchQTY(loginas, id, txt_wqty);
            }
            
            function WatchMinus(id)
            {
                var txt_wqty = $('#txt_wqty_' + id).val();
                txt_wqty = (txt_wqty * 1) - 1;
                if(txt_wqty < 1) {return false;}
                $('#txt_wqty_' + id).val(txt_wqty);
                WatchQTY(loginas, id, txt_wqty);
            }

            function WatchQTY(loginas, id, qty)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList_QTY.php',
                    data:'&email='+loginas+'&id='+id+'&qty='+qty,
                    success:function(msg){
                    }
                });
            }

            function WatchtoCart(id)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList_ToCart.php',
                    data:'&email='+loginas+'&id='+id,
                    success:function(msg){
                        if(msg.trim() == 'Y')
                        {
                            LoadingCart('N');
                            var row = document.getElementById('w_tr_' + id);
                            if(row){row.remove();}
                            
                        }
                    }
                });
            }

            function WatchRemove(id)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList_Remove.php',
                    data:'&email='+loginas+'&id='+id,
                    success:function(msg){
                        if(msg.trim() == 'Y')
                        {
                            var row = document.getElementById('w_tr_' + id);
                            if(row){row.remove();}
                        }
                    }
                });
            }

            function CartsTable()
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/CartTable.php',
                    data:'&email='+loginas,
                    success:function(msg){
                        document.getElementById("Item_List").innerHTML = msg;
                    }
                });
            }

            function CartsTablePlus(id)
            {
                var txt_qty = $('#txt_cqty_' + id).val();
                txt_qty = (txt_qty * 1) + 1;
                $('#txt_cqty_' + id).val(txt_qty);
                
                var price = $('#ct_price_' + id).val();
                var amount = (txt_qty * 1) * (price * 1);
                $('#ct_amount_' + id).html('$' + parseFloat(amount).toFixed(2));

                var sub_total = $('#ct_subtotal_amount').val();
                var tax = $('#ipt_tax').val();
                sub_total = parseFloat((sub_total * 1) + (price * 1)).toFixed(2);
                CartsTableOrder(sub_total);
                AddToCart(id,'Cart',1,1);
            }

            function CartsTableMinus(id)
            {
                var txt_qty = $('#txt_cqty_' + id).val();

                txt_qty = (txt_qty * 1) - 1;
                if(txt_qty < 1) {return false;}
                $('#txt_cqty_' + id).val(txt_qty);

                var price = $('#ct_price_' + id).val();
                var amount = (txt_qty * 1) * (price * 1);
                $('#ct_amount_' + id).html('$' + parseFloat(amount).toFixed(2));
                
                var sub_total = $('#ct_subtotal_amount').val();
                sub_total = parseFloat((sub_total * 1) - (price * 1)).toFixed(2);
                CartsTableOrder(sub_total);
                AddToCart(id,'Cart',-1,1);
            }
            
            function CartsTableRemove(id)
            {
                
                var txt_qty = $('#txt_cqty_' + id).val();
                var price = $('#ct_price_' + id).val();
                var amount = (txt_qty * 1) * (price * 1);
               
                var sub_total = $('#ct_subtotal_amount').val();
                sub_total = parseFloat((sub_total * 1) - (amount * 1)).toFixed(2);

                var tax_amount = (sub_total * 1) * (tax * 1);
                var total = parseFloat((sub_total * 1) + (tax_amount * 1)).toFixed(2);

                $('#ct_subtotal_amount').val(sub_total);
                $('#ct_subtotal').html('$' + parseFloat(sub_total * 1).toFixed(2));
                $('#ct_tax').html('$' + parseFloat(tax_amount * 1).toFixed(2));
                $('#ct_total').html('$' + parseFloat(total * 1).toFixed(2));
                
            }

            function CartsTableOrder(sub_total)
            {
                var tax_amount = (sub_total * 1) * (tax * 1);
                var total = parseFloat((sub_total * 1) + (tax_amount * 1)).toFixed(2);

                $('#ct_subtotal_amount').val(sub_total);
                $('#ct_subtotal').html('$' + parseFloat(sub_total * 1).toFixed(2));
                $('#ct_tax').html('$' + parseFloat(tax_amount * 1).toFixed(2));
                $('#ct_total').html('$' + parseFloat(total * 1).toFixed(2));
            }

            function Register()
            {
                var rg_name = $('#rg_name').val();
                var rg_email = $('#rg_email').val();
                var rg_pwd = $('#rg_pwd').val();
                var rg_pwd_confirmed = $('#rg_pwd_confirmed').val();
                if(rg_pwd_confirmed != rg_pwd){ return false;}
              
                $.ajax({
                    type:'POST',
                    url:'Account/sp_register.php',
                    data:'&rg_email='+rg_email+'&rg_pwd='+rg_pwd+'&rg_name='+rg_name,
                    success:function(msg){
                        if(msg==0)
                        {
                            UpdatCarts(rg_email);
                            $("#topbarregister").modal('hide');
                        }
                    }
                });
            }

            function LogIn()
            {
                var log_email = $('#log_email').val();
                var log_pwd = $('#log_pwd').val();
                $.ajax({
                        type:'POST',
                        url:'Account/sp_login.php',
                        data:'&log_email='+log_email+'&log_pwd='+log_pwd,
                        success:function(msg){
                            if(msg==1){
                                UpdatCarts(log_email);
                                $("#topbarlogin").modal('hide');
                            }

                        }
                    });
            }

            function LogOut()
            {
                var ip = '';
                $.getJSON("https://api.ipify.org?format=json", function(data) {
                    ip = data.ip;
                    $.ajax({
                        type:'POST',
                        url:'Account/sp_logout.php',
                        data:'&ip='+ip,
                        success:function(msg){
                            location.reload("index.php");
                        }
                    }); 
                })
            }

            function UpdatCarts(email)
            {
                var ip = '';
                $.getJSON("https://api.ipify.org?format=json", function(data) {
                    ip = data.ip;
                    $.ajax({
                        type:'POST',
                        url:'Cart/sp_updatecarts.php',
                        data:'&email='+email+'&ip='+ip,
                        success:function(msg){
                            LoadingCart('Y');
                        }
                    });
                })
            }

            function MyAccount(email)
            {
                $.ajax({
                    type:'POST',
                    url:'Account/MyAccount.php',
                    data:'&email='+email,
                    success:function(msg){
                        document.getElementById("my_account").innerHTML = msg;
                    }
                });
            }
        </script>
