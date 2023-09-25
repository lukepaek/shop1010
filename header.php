        <?php
            include 'header/TopHeader.php'; 
            include 'modal/quickview_form.php';
        ?>

        <div id="mini_cart"></div>
        <div id="Item_List"></div>
        
        <script>
            var email = 'dymong007@gmail.com';
            
            function LoadingCart(Flag)
            {
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

            function RemoveCart(id)
            {
                $.ajax({
                    type:'POST',
                    url:'Cart/RemoveCart.php',
                    data:'id='+id+'&email='+email,
                    success:function(msg){
                        if(msg.trim()=='Y')
                        {
                            CartRemove(id);
                            var row = document.getElementById('li' + id);
                            if(row){row.remove();}
                            TotalCart('Y');
                        }
                    }
                });
            }

            function AddToCart(id, status_desc, qty, loading)
            {
                //alert(id + ' ' + status_desc + ' ' + qty)
                $.ajax({
                    type:'POST',
                    url:'Cart/AddToCart.php',
                    data:'id='+id+'&email='+email+'&status_desc='+status_desc+'&qty='+qty,
                    success:function(msg){
                        //alert(msg);
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

            function CartRemove(id)
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

                AddToCart(id,'Cart',-1,0);
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

            
            function WatchPlus(id)
            {
                var txt_wqty = $('#txt_wqty_' + id).val();
                txt_wqty = (txt_wqty * 1) + 1;
                $('#txt_wqty_' + id).val(txt_wqty);
                WatchQTY(email, id, txt_wqty);
            }
            
            function WatchMinus(id)
            {
                var txt_wqty = $('#txt_wqty_' + id).val();
                txt_wqty = (txt_wqty * 1) - 1;
                if(txt_wqty < 1) {return false;}
                $('#txt_wqty_' + id).val(txt_wqty);
                WatchQTY(email, id, txt_wqty);
            }

            function WatchQTY(email, id, qty)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList_QTY.php',
                    data:'&email='+email+'&id='+id+'&qty='+qty,
                    success:function(msg){
                    }
                });
            }

            function WatchtoCart(id)
            {
                $.ajax({
                    type:'POST',
                    url:'WatchList/WatchList_ToCart.php',
                    data:'&email='+email+'&id='+id,
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
                    data:'&email='+email+'&id='+id,
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
                    data:'&email='+email,
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
                AddToCart(id,'Cart',1,0);
            }

            function CartsTableMinus(id)
            {
                var txt_qty = $('#txt_cqty_' + id).val();
                txt_qty = (txt_qty * 1) - 1;
                if(txt_qty < 1) {return false;}
                $('#txt_cqty_' + id).val(txt_qty);
                AddToCart(id,'Cart',-1,0);
            }

        </script>
