<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our-Story MTDiscuss</title>
    <style>
    #image {
        width: 30vw;
        height: 55vh;
    }

    #socialmedia-combine-img{
        height: 50px;
        width: 300px;
        margin-bottom: 50px;
    }
    .container {
        display: flex;
        flex-direction: row;
        margin-top: 50px;
    }

    .left {
        display: flex;
        flex-direction: column;
        margin-left: 0px;
    }
    .right {
        display: flex;
        width: 33%;
        margin-top: 30px;
        flex-direction: column;
        margin-left: 180px;
    }
    .logo-img{
        width: 30px;
        height: 30px;
        margin: 20px 10px;
    }
    </style>
</head>

<body>
    <?php include 'parts/_navbar.php'; ?>
    <hr>
    <hr>
    <div class="container">
        <section class="col-sm-5 left">
            <h3>B.Tech(CSE) MIET Student</h3>
            <img id="image" src="img/Mohit.jpg" alt="There is my Picture">
            <p class="my-4" id="intro"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt consectetur
                velit temporibus? Repellendus
                sint
                similique molestias minus, nostrum dolorum rem. Voluptates, quidem? Architecto aspernatur quod in minima
                tempore
                sapiente vero ipsum excepturi distinctio consequatur unde fugit quibusdam blanditiis optio similique,
                nulla
                veniam dicta sint, laboriosam iste cum sunt autem? Eaque aliquid vero nobis explicabo? Reiciendis,
                error.
                Sed
                totam ea optio cumque! Repellat dicta, nisi eum autem aspernatur, reprehenderit adipisci possimus
                laudantium
                velit aliquam doloremque illo dolores, libero tempore amet iusto laboriosam. Sit voluptas porro quisquam
                magnam,
                velit dolor molestiae nostrum ipsa tempore ea omnis quaerat repellendus pariatur! Placeat inventore
                architecto
                neque amet ea, consectetur quidem? Inventore nostrum unde veniam ea itaque voluptate, debitis incidunt
                reiciendis sit alias illum vel ut quibusdam blanditiis dolor, necessitatibus eum asperiores sunt
                officiis
                dolores in provident. Quas blanditiis itaque neque fugit! Voluptatem corporis molestias animi. Tenetur,
                est
                ipsa. Quisquam atque voluptatem asperiores nihil quis culpa laborum impedit tempore aperiam soluta
                cumque
                non
                voluptates optio reiciendis corrupti iusto obcaecati, aspernatur beatae assumenda? Atque perspiciatis
                quisquam
                blanditiis, facilis quaerat quas iste saepe sequi suscipit exercitationem minima cumque, odit voluptatum
                vero
                beatae veniam! Eligendi corporis doloremque repudiandae nam nesciunt, impedit repellendus culpa ullam
                ipsa
                ex
                minima numquam sunt dolores excepturi quasi vel suscipit tempora sit quaerat voluptates reprehenderit
                laboriosam
                et facere! Nam nulla maiores, facere dignissimos mollitia distinctio fugiat eius. Eius delectus tenetur
                distinctio? Sit laudantium reprehenderit labore, fuga laborum amet neque adipisci, nam ipsum
                voluptatibus
                delectus tenetur nesciunt incidunt expedita non veniam, culpa saepe sunt beatae necessitatibus. Cumque
                animi
                ullam tempore eaque corrupti rerum fugit? Ut, adipisci molestias in nisi, dolor, animi nulla eius
                nesciunt
                id
                vero velit distinctio impedit quibusdam eaque facilis sit est porro mollitia debitis excepturi illo
                facere
                repudiandae magni? Error fugit facilis, ut officiis hic enim. Sunt libero quia repudiandae. Quam, qui
                ipsam!
            </p>
        </section>
        <section class="right col-sm-5">
          <img id="socialmedia-combine-img" src="img/combine_logo.png" alt="">
          <div class="col-sm-8 follow_area">
          <h4>Follow Us!!</h4>
          <a href=""><img class="logo-img" src="img/instagram.png" alt="">Instagram</a>
          <a href=""><img class="logo-img" src="img/facebook.png" alt="">Facebook</a>
          <a href=""><img class="logo-img" src="img/linkedin.png" alt="">Linkedin</a>
          <a href=""><img class="logo-img" src="img/github.png" alt="">Github</a>
          <a href="https://www.youtube.com/channel/UC-1ZbTce2iN3YHDt1X3fG4w?view_as=subscriber" target="_blank"><img class="logo-img" src="img/YouTube.png" alt="">YouTube</a>
          <a href=""><img class="logo-img" src="img/Twitter.jpg" alt="">Twitter</a>
          <h4>Follow Us on Github for more Projects</h4>
          </div>
        </section>
    </div>
</body>

</html>