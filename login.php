<?php
include_once 'set.php';
$_title = "Đăng nhập NSOHUY";
include_once 'head.php';
$alert = null;
if ($_login == null) {
	if (isset($_POST['username'])) {
		$verifyResponse = curl_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $w_api_recaptcha_private . '&response=' . $_POST['g-recaptcha-response']);
		$responseData = json_decode($verifyResponse);

		if ($responseData->success) {
			$user = htmlspecialchars($_POST['username']);
			$pass = htmlspecialchars($_POST['password']);
			$select = _fetch(_select("*", 'player', "username='$user'"));
			if ($select['password'] == $pass) {
				$_SESSION['user'] = $user;
				$alert = _alert('succ','Đăng nhập thành công');
			} else {
				$alert = _alert('err','Thông tin đăng nhập không chính xác !');
			}
		} else {
			$alert = _alert('err', 'Là 1 ninja thì mắt phải tinh, tay phải nhạy. Tiểu huynh đệ hãy đặt tay xác minh mình không phải robot đi.');
		}
	}
} else {
	header("location:/");
}

?>
<!-- particles.js container -->
<div id="particles-js"></div> <!-- stats - count particles -->
<!-- particles.js lib - https://github.com/VincentGarreau/particles.js -->
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<style>
	/* ---- reset ---- */
	body {
		margin: 0;
		font: normal 75% Arial, Helvetica, sans-serif;
	}

	canvas {
		display: block;
		vertical-align: bottom;
	}

	/* ---- particles.js container ---- */
	#particles-js {
		position: fixed;
		width: 100%;
		height: 100%;
		top: 0;
		bottom: 0;
		background-color: #f1e0e0;
		background-image: url("");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 50% 50%;
	}

	/* ---- stats.js ---- */
	.count-particles {
		background: #000022;
		position: absolute;
		top: 48px;
		left: 0;
		width: 80px;
		color: #13E8E9;
		font-size: .8em;
		text-align: left;
		text-indent: 4px;
		line-height: 14px;
		padding-bottom: 2px;
		font-family: Helvetica, Arial, sans-serif;
		font-weight: bold;
	}

	.js-count-particles {
		font-size: 1.1em;
	}

	#stats,
	.count-particles {
		-webkit-user-select: none;
		margin-top: 5px;
		margin-left: 5px;
	}

	#stats {
		border-radius: 3px 3px 0 0;
		overflow: hidden;
	}

	.count-particles {
		border-radius: 0 0 3px 3px;
	}
</style>
<script>
	particlesJS("particles-js", {
		"particles": {
			"number": {
				"value": 80,
				"density": {
					"enable": true,
					"value_area": 800
				}
			},
			"color": {
				"value": "#000000"
			},
			"shape": {
				"type": "circle",
				"stroke": {
					"width": 0,
					"color": "#000000"
				},
				"polygon": {
					"nb_sides": 5
				},
				"image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				}
			},
			"opacity": {
				"value": 0.5,
				"random": false,
				"anim": {
					"enable": false,
					"speed": 1,
					"opacity_min": 0.1,
					"sync": false
				}
			},
			"size": {
				"value": 3,
				"random": true,
				"anim": {
					"enable": false,
					"speed": 40,
					"size_min": 0.1,
					"sync": false
				}
			},
			"line_linked": {
				"enable": true,
				"distance": 150,
				"color": "#000000",
				"opacity": 0.4,
				"width": 1
			},
			"move": {
				"enable": true,
				"speed": 6,
				"direction": "none",
				"random": false,
				"straight": false,
				"out_mode": "out",
				"bounce": false,
				"attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 1200
				}
			}
		},
		"interactivity": {
			"detect_on": "canvas",
			"events": {
				"onhover": {
					"enable": true,
					"mode": "repulse"
				},
				"onclick": {
					"enable": true,
					"mode": "push"
				},
				"resize": true
			},
			"modes": {
				"grab": {
					"distance": 400,
					"line_linked": {
						"opacity": 1
					}
				},
				"bubble": {
					"distance": 400,
					"size": 40,
					"duration": 2,
					"opacity": 8,
					"speed": 3
				},
				"repulse": {
					"distance": 200,
					"duration": 0.4
				},
				"push": {
					"particles_nb": 4
				},
				"remove": {
					"particles_nb": 2
				}
			}
		},
		"retina_detect": true
	});
	var count_particles, stats, update;
	stats = new Stats;
	stats.setMode(0);
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.left = '0px';
	stats.domElement.style.top = '0px';
	document.body.appendChild(stats.domElement);
	count_particles = document.querySelector('.js-count-particles');
	update = function() {
		stats.begin();
		stats.end();
		if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
			count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
		}
		requestAnimationFrame(update);
	};
	requestAnimationFrame(update);;
</script>
<div class="login-box mt-header">
    
	<!-- /.login-logo -->
	<div class="login-box-body box-custom">
		<p class="login-box-msg">Đăng nhập hệ thống</p>
		<span class="help-block" style="text-align: center;color: #dd4b39">
			<strong></strong>
		</span>
		<form method="POST">
			<input type="hidden" name="_token" value="aM40oWcENju3u6wQPyWLY3gWcIAZp8l3jAt2CzKa">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="username" value="" placeholder="Tài khoản của Web">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="g-recaptcha" data-sitekey="<?php echo $w_api_recaptcha; ?>"></div>
			<div class="row">
				<div class="col-xs-6">
					<div class="checkbox icheck">
						<label style="color: #666">
							<input type="checkbox" name="remember" id="remember"> Ghi nhớ
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-6" style="text-align: right">
					<a href="password/reset.html" style="color: #666;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Quên mật khẩu?</a><br>
				</div>
				<!-- /.col -->
			</div>
			<div class="notifi"><?php echo $alert; ?></div>
			<div class="row">

				<!-- /.col -->
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng nhập</button>
				</div>
				<!-- /.col -->
			</div>
		</form>

		<!-- /.social-auth-links -->
	</div>
	<!-- /.login-box-body -->
</div>
<style>
	.login-box,
	.register-box {
		width: 400px;
		margin: 2rem auto ;
		padding: 20px;
	}
	@media (max-width: 767px) {

		.login-box,
		.register-box {
			width: 100%;
		}

	}

	.login-box-msg,
	.register-box-msg {
		margin: 0;
		text-align: center;
		padding: 0 20px 20px 20px;
		text-align: center;
		font-size: 20px;
		;
		font-weight: bold;
	}

	.box-custom {
		position: relative;
		border: 1px solid #cccccc;
		padding: 20px;
		color: #666;
	}
</style>

<script>
	var errorMess=$('.notifi').find('.error').text();
	if(errorMess){
		swal("Thất bại", errorMess, "warning");
	}
	var succMess=$('.notifi').find('.success').text();
	if(succMess){
		swal("Thành công!", succMess, "success")
		.then(()=>location.href = '/user.php');
	}
</script>
<?php
include_once 'end.php';
?>