{% extends "index.html"%} {# this is a comment#} {% block middle %}{% endblock %}
{% block content %}
<!-- table body beginning --> 
<!--
        <div id="page-wrapper">
            <div class="graphs">
                <div class="col-sm-12">
                    <div class="xs tabls">
                        <div class="bs-example4" data-example-id="contextual-table">
-->
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Toy Name</th>
                                    <th>Toy Type</th>
                                    <th>Manufacturer</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                {% for x in alltoys %}
                                    <tr class="active">
                                        <th>
                                            <a href="displayCart.php?Grocery_Id={{ x.Grocery_id }}">{{ x.toy_name }}</a>
                                        </th>
                                        <td>{{x.toy_type}}</td>
<!--                                        <td>{{x.Grocery_type}}</td>-->
                                        <td>{{x.man_name}}</td>
<!--                                        <td>{{x.Brand_name}}</td>-->
                                        <td>{{x.price}}</td>
                                        <td>
                                            <button class="btn btn_1" style="background-color: #00aaf1">Edit</button>
                                            {#<button class="btn btn_1" style="background-color: #00aaf1">Edit</button>#}
                                        </td>
                                    </tr>
                                {% endfor %}
                                </tbody>
                            </table>
                            {#Cart#}

<!--                        </div>-->


                        <div class="panel-body1">
                            <center>
                                <h1>Cart</h1>
                            </center>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Toy Name</th>
                                    <th>Toy Type</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                {% for cart in carts %}
                                    <tr class="active">
                                        <td>{{ cart.toy_name }}</td>
                                        <td>{{ cart.tory_Type }}</td>
                                        <td>${{ cart.Price }}</td>
                                        <td>{{ cart.quantity }}</td>
                                        <td>${{ cart.total }}</td>
                                        <td><a href="showcart.php?action=add&id={{ cart.item }}">Increase</a></td>
                                        <td><a href="showcart.php?action=subtract&id={{ cart.item }}">Decrease</a></td>
                                        <td><a href="showcart.php?action=remove&id={{ cart.item }}">Remove</a></td>

                                    </tr>
                                {% endfor %}
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <center>
                            <h3>Subtotal: ${{ total }}</h3>
                        </center>

                        <center>
                            <a href="showcart.php?action=clear&id=0"><h3></h3>Clear Cart</a>

                            <h3><a href="">Checkout</a></h3>
                        </center>

                        <div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
{% endblock %}{% block foot %}{% endblock %}