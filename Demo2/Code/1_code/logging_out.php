<?php
				echo "
					<script type=\"text/javascript\">
						console.log('reached file');
					</script>
				";
				session_destroy();
				unset($_SESSION['inputEmail3']);
				$url = "login.php";
				header('Location: '.$url);
				
?>