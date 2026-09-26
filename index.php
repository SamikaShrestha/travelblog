<?php
require_once "header.php";
require_once "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    background-color: #023047;
    }
</style>
<body>
    <main>
        <section>
            <section class="hero-section">
                <div class="heros-video">
                    <video autoplay loop muted playsinline class="hero-video">
                        <source src="./video/herovideo.mp4" type="video/mp4">
                        Your browser does not support video.
                    </video>
                </div>

                <div class="hero-overlay"></div>

                <div class="home-slogan">
                    <h1 class="home-heading">Explore . Dream . Discover .</h1>
                    <p class="home-description">This is a travel blog featuring beautiful destinations, new experiences and hidden<br>
                        places around the globe.</p>
                    <button class="home-btn">Start Exploring &gt;</button>
                </div>
            </section>
            <section>
                <div class="options-container">
                    <h2 class="options-heading">Featured</h2>
                    <div class="featured-images">
                        <div class="first-img">
                            <a href="blogs.php">
                                <img src="./img/travel blogs.jpg" alt="" class="fimage">
                            </a>
                            <p class="f-tags">Travel Blogs</p>
                        </div>
                        <div class="second-img">
                            <img src="./img/destinations.jpg" alt="" class="fimage">
                            <p class="f-tags">Destinations</p>
                        </div>
                        <div class="third-img">
                            <img src="./img/travel guides.jpg" alt="" class="fimage">
                            <p class="f-tags">Travel Guides</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="popular-section">
                <h2 class="pop-heading">Popular Posts</h2>
                <p class="section-subtitle">Discover our most read travel stories and guides</p>
                <div class="popular-grid">
                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img/japan.jpg" alt="Bali Beach">
                        </div>
                        <div class="card-content">
                            <h3>Exploring the Hidden Beaches of Bali</h3>
                            <p>Discover secluded shores, crystal waters, and secret spots away from the crowd.</p>
                            <a href="" class="read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img/switzerland.avif" alt="Swiss Alps">
                        </div>
                        <div class="card-content">
                            <h3>A First-Timer's Guide to the Swiss Alps</h3>
                            <p>Everything you need to know about hiking, trains, and cozy mountain villages.</p>
                            <a href="" class="read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img//italy.webp" alt="Tokyo Street">
                        </div>
                        <div class="card-content">
                            <h3>Tokyo Nightlife: Secret Food Alleyways</h3>
                            <p>Taste authentic local cuisine across the narrow streets of Shinjuku and Shibuya.</p>
                            <a href="" class="read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img/travel blogs.jpg" alt="Santorini">
                        </div>
                        <div class="card-content">
                            <h3>Sunset Spots in Santorini You Can't Miss</h3>
                            <p>Unforgettable views, cliffside cafes, and white-washed villages in Greece.</p>
                            <a href="" class="read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img/destinations.jpg" alt="Camping">
                        </div>
                        <div class="card-content">
                            <h3>10 Budget Travel Tips for Backpacker Couples</h3>
                            <p>Save big on lodging, transit, and activities without sacrificing fun.</p>
                            <a href="" class="read-more">Read More </a>
                        </div>
                    </div>

                    <div class="post-card">
                        <div class="card-image">
                            <img src="./img/travel guides.jpg" alt="Italy Food">
                        </div>
                        <div class="card-content">
                            <h3>The Ultimate Italian Food Crawl</h3>
                            <p>From Naples pizza to Roman pasta, eat your way through classic culinary hubs.</p>
                            <a href="" class="read-more">Read More </a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="aboutus">
                <div class="about-container">
                    <div class="about-img">
                        <img src="./img/blogpage.jpg" alt="" class="a-img">
                    </div>
                    <div class="detail">
                    <h1>About Us!</h1>
                    <p>Welcome to Wanderlust! 🌍✈️<br><br>
                        We are a travel blog dedicated to inspiring people to explore new destinations,<br> discover different cultures, and create unforgettable memories.<br><br>
                        From travel guides and tips to beautiful destinations and local experiences, we help<br> make your next adventure easier and more exciting.<br><br>
                        Explore. Experience. Remember.</p>
                    </div>
                </div>
            </section>
            <section id="destinations">
                <div class="destination">
                    <h2 class="destination-heading">Destinations</h2>
                    <div class="destinations-pic">
                        <div class="des-card">
                            <img src="img/travel guides.jpg" alt="" class="destiny-img">
                            <p>Maldives</p>
                        </div>
                        <div class="des-card">
                            <img src="img/destinations.jpg" alt="" class="destiny-img">
                            <p>China</p>
                        </div>
                        <div class="des-card">
                            <img src="img/hero-background.jpg" alt="" class="destiny-img">
                            <p>Greece</p>
                        </div>
                        <div class="des-card">
                            <img src="img/switzerland.avif" alt="" class="destiny-img">
                            <p>Indonesia</p>
                        </div>
                        <div class="des-card">
                            <img src="img/italy.webp" alt="" class="destiny-img">
                            <p>Egypt</p>
                        </div>
                        <div class="des-card">
                            <img src="img/japan.jpg" alt="" class="destiny-img">
                            <p>Italy</p>
                        </div>
                    </div>
                </div>
            </section>
    </main>
</body>

</html>

<?php
require_once "footer.php";
?>