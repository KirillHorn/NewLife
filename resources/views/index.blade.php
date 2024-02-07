<x-header />

<script>
    $(document).ready(function() {
        $("#comments-slider").owlCarousel({
            navigation: false,
            slideSpeed: 100,
            paginationSpeed: 800,
            singleItem: true,
            autoPlay: true
        });
    });
</script>

<section>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div id="comments-slider">
                        <div class="well">
                            <div class="quote">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices, elit sed faucibus pharetra, diam mauris bibendum orci, sit amet ullamcorper purus dui sit amet augue. Donec aliquet diam ut neque mattis, eu tristique sem rutrum.</p>
                            </div>
                            <div class="persona">
                                <div class="photo"><img class="img-circle img-thumbnail" src="https://bootstraptema.ru/snippets/icons/2016/mia/1.png" alt="" /></div>
                                <p>Cup Streer</p>
                                <p>Director Company</p>
                            </div>

                        </div><!-- ./well -->

                        <div class="well">

                            <div class="quote">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices, elit sed faucibus pharetra, diam mauris bibendum orci, sit amet ullamcorper purus dui sit amet augue. Donec aliquet diam ut neque mattis, eu tristique sem rutrum.</p>
                            </div>
                            <div class="persona">
                                <div class="photo"><img class="img-circle img-thumbnail" src="https://bootstraptema.ru/snippets/icons/2016/mia/2.png" alt="" /></div>
                                <p>Regit Teersana</p>
                                <p>Designer Company</p>
                            </div>

                        </div><!-- ./well -->

                        <div class="well">

                            <div class="quote">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices, elit sed faucibus pharetra, diam mauris bibendum orci, sit amet ullamcorper purus dui sit amet augue. Donec aliquet diam ut neque mattis, eu tristique sem rutrum.</p>
                            </div>
                            <div class="persona">
                                <div class="photo"><img class="img-circle img-thumbnail" src="https://bootstraptema.ru/snippets/icons/2016/mia/3.png" alt="" /></div>
                                <p>Pablo Napp</p>
                                <p>Individual person Company</p>
                            </div>

                        </div><!-- ./well -->

                    </div><!-- ./comments-slider -->

                </div><!-- ./col-md-offset-2 col-md-8 -->
            </div><!-- ./row -->
        </div><!-- ./container -->
</section>

</body>

</html>