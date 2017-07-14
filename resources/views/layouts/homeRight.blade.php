<div class="tech-btm">
    <div class="search-1 wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
        <form action="#" method="post">
            <input type="search" name="Search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>
    <h4>Popular Posts </h4>
    @foreach($art_new as $v)
    <div class="blog-grids wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
        <div class="blog-grid-left">
            <a href="singlepage.html"><img src="/{{$v->art_image}}" class="img-responsive" alt=""></a>
        </div>
        <div class="blog-grid-right">

            <h5><a href="singlepage.html">{{$v->art_title}}</a> </h5>
        </div>
        <div class="clearfix"> </div>
    </div>
    @endforeach
    <div class="insta wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
        <h4>Instagram</h4>
        <ul>

            <li><a href="singlepage.html"><img src="/resources/views/home/images/t1.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/m1.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/f1.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/m2.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/f2.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/t2.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/f3.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/t3.jpg" class="img-responsive" alt=""></a></li>
            <li><a href="singlepage.html"><img src="/resources/views/home/images/m3.jpg" class="img-responsive" alt=""></a></li>
        </ul>
    </div>

    <p>Lorem ipsum ex vix illud nonummy, novum tation et his. At vix scripta patrioque scribentur, at pro</p>
</div>