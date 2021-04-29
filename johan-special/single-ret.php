<?php

//The template for displaying front page


get_header();
?>


<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <article>
            <img class="pic" src="" alt="">
            <div>
                <h2></h2>
                <p class="tekst"></p>
                <p class="pris"></p>
            </div>
        </article>
    </main>

    <script>
        let ret;
        const url = "http://johanrives.dk/passionssite/wp-json/wp/v2/ret/" + <?php echo get_the_ID() ?>;

        async function getJson() {
            const data = await fetch(url);
            ret = await data.json();
            visRetter();
        }

        function visRetter() {
            document.querySelector("h2").textContent = ret.title.rendered;
            document.querySelector(".pic").src = ret.billede.guid;
            document.querySelector(".tekst").textContent = ret.beskrivelse;
            document.querySelector(".pris").textContent = ret.pris;
        }

        getJson();

    </script>
</section>
<!--#primary-->

<?php
get_footer();
