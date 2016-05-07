{% extends "index.html" %} {% block content %} {% for x in searchtoys %}
<div class="row">
    <div class="col-md-2">
        <div class="grid">
            <div class="portfolio app mix_all" data-cat="app" style="display: inline-block; opacity: 1;">
                <div class="portfolio-wrapper">
                    <a data-toggle="modal" data-target=".bs-example-modal-md" href="#" class="b-link-stripe b-animate-go  thickbox">
                        <div>
                            <img src="{{x.image}}" />
                            <div class="b-wrapper">
                                <h2 class="b-animate b-from-left    b-delay03 "><img src="images/link-ico.png" alt=""/></h2>
                            </div>
                    </a>
                    </div>
                </div>
                <p class="text-center">{{x.toy_name}}</p>
                <h2 class="text-center">${{x.price}}</h2>
                <p class="text-center"><a href="details.html">Buy</a></p>
            </div>
        </div>
    </div>
    {% endfor %}
    <br />
    <center>
        <div class='panel-footer'>
            {% if total_pages > 0 %}
            <ul class='pagination pagination-sm' id="pagination">
                {% for i in 1..total_pages %} {% if loop.first %} {% if page == 1 %}
                <li class="prev disabled">
                    <a>
                        <i class="fa fa-angle-double-left">First</i>
                    </a>
                </li>
                <li class="prev disabled">
                    <a>
                        <i class="fa fa-angle-left">Prev</i>
                    </a>
                </li>
                {% else %}
                <li class="prev">
                    <a href='searchresult.php?page={{ 1 }}'>
                        <i class="fa fa-angle-double-left">First</i>
                    </a>
                </li>
                <li class="prev">
                    <a href='searchresult.php?page={{ page - 1 }}'>
                        <i class="fa fa-angle-left">Prev</i>
                    </a>
                </li>
                {% endif %} {% endif %} {% if loop.last %} {% if page == total_pages %}
                <li class="next disabled">
                    <a>
                        <i class="fa fa-angle-right">Next</i>
                    </a>
                </li>
                <li class="next disabled">
                    <a>
                        <i class="fa fa-angle-double-right">Last</i>
                    </a>
                </li>
                {% else %}

                <li class="next">
                    <a href='searchresult.php?page={{ page + 1 }}'>
                        <i class="fa fa-angle-right">Next</i>
                    </a>
                </li>
                <li class="next">
                    <a href='searchresult.php?page={{ total_pages }}'>
                        <i class="fa fa-angle-double-right">Last</i>
                    </a>
                </li>
                {% endif %} {% endif %} {% endfor %}
            </ul>
            {% endif %} {#

            <div class='pull-right' id="paginationResult">#}

            </div>
            Page <a>{{ page }}</a> out of <a>{{ total_pages }}</a>
    </center>
    {% endblock %}{% block middle %}{% endblock %}{% block foot %}{% endblock %}