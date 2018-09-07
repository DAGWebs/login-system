<?php require_once "includes/header.php"; ?>
<div class="container">
	<?php display_message(); ?>
	<div class="row">
		<div class="col-m-3 col-lg-3 col-sm-3 col-xs-3"></div>
		<div class="col-m-6 col-lg-6 col-sm-6 col-xs-6">
			<?php echo validate_registration(); ?>
			<form action="" class="bg-dark user-form" method="post">
				<div class="form-group">
					<label for="first">First Name: </label>
					<input type="text" name="first" id="first" class="form-control" placeholder="First Name">
				</div>
				<div class="form-group">
					<label for="last">Last Name: </label>
					<input type="text" name="last" id="last" class="form-control" placeholder="Last Name">
				</div>
				<div class="form-group">
					<label for="username">Username: </label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="text" name="email" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="confirmpassword">Confirm Password: </label>
					<input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password">
				</div>
				<div class="form-group">
					<input type="checkbox" name="remember" class="" required> <span>Do you agree with our <a href="#" data-toggle="modal" data-target="#exampleModalLong">terms and conditions?</a></span>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="form-control btn-primary">
				</div>
				<div class="form-group">
					<span>Already have an account? <a href="<?php echo URL . "login" ?>">Login Here!</a></span>
				</div>
			</form>
		</div>
		<div class="col-m-3 col-lg-3 col-sm-3 col-xs-3"></div>
	</div>
</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas numquam ab itaque! Sint, quam fugit voluptatibus dignissimos fuga dolorem dicta odio iure, vel, adipisci asperiores corporis maxime error doloremque repellat.</div>
        <div>Excepturi ducimus ullam soluta non nostrum. Molestias aliquam debitis mollitia distinctio. Praesentium non, perferendis pariatur, recusandae quae nulla aperiam debitis deleniti quidem iure eveniet eaque autem. Delectus earum maiores, dolorum.</div>
        <div>Laudantium facilis a rerum quis optio? Maxime sunt porro illo veritatis neque officiis fugiat nostrum ut, provident, sit saepe, blanditiis dignissimos id laudantium cumque. Nulla porro deleniti voluptas, consequatur vel.</div>
        <div>Voluptas, inventore laudantium optio similique omnis earum, doloremque qui nulla. Eius illo nesciunt dignissimos dolor explicabo numquam, pariatur repellendus, inventore eos perferendis necessitatibus voluptas quibusdam id omnis repellat reiciendis corporis.</div>
        <div>Aliquid sequi ratione reiciendis eaque hic placeat cum minus, nobis at ea qui vero nisi pariatur distinctio, earum veritatis libero obcaecati ipsum amet, odio. Veniam, nostrum. Fugiat repellat modi, at.</div>
        <div>Molestias, ipsa natus illo quos minus odio error temporibus aperiam itaque atque inventore magnam ullam consequuntur accusantium, non impedit doloribus eaque, blanditiis illum veritatis iure eligendi velit voluptatibus. Autem, nobis?</div>
        <div>Natus dolore fugit eveniet, reprehenderit illo eum quae dolores. Sunt fugit unde quibusdam sequi, autem velit nam consequatur tenetur quos rerum delectus quas, ipsam! Eveniet quas molestiae, esse voluptate facilis?</div>
        <div>Animi, illo minima ut fuga numquam blanditiis iure. At aliquid sit voluptates a minus deserunt consequatur aut alias sint ab? Necessitatibus voluptatum minus obcaecati, minima tenetur! Accusamus incidunt quibusdam aspernatur.</div>
        <div>Dolore modi tempore maxime eius repudiandae natus obcaecati ratione blanditiis porro sit, a voluptatibus nam illo, doloribus ducimus libero temporibus eveniet ex velit? Totam sint, ut consectetur, praesentium numquam voluptates?</div>
        <div>Quia eligendi et nesciunt dolorem. Modi sed assumenda aperiam minus aut, ab, ad itaque illo quaerat, quod, aliquam expedita omnis temporibus. Architecto facere magnam quidem fugiat quasi adipisci molestiae perspiciatis?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php require_once "includes/footer.php"; ?>