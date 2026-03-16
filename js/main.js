
    const VALID_USERS = [
        { username: 'admin', password: 'admin123', name: 'Administrator', role: 'Super Admin' }
    ];

    function togglePassword(){
        const input = document.getElementById('loginPass');
        const icon = document.getElementById('pwIcon');
        if(input.type === 'password'){
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
	
	function handleLogin(e){
			e.preventDefault();

			const username = document.getElementById('loginUser').value.trim();
			const password = document.getElementById('loginPass').value;
			const remember = document.getElementById('rememberMe').checked;
			const btn = document.getElementById('btnLogin');
			const errorEl = document.getElementById('loginError');

			// Hide previous errors
			errorEl.classList.remove('show');

			// Show loading
			btn.classList.add('loading');

			$.ajax({
				url: "Controller.php",
				type: "POST",
				data: {
					username: username,
					password: password
				},
				dataType: "json",
				success: function(response){

					if(response.status === "success"){

						// Save session
						localStorage.setItem('rw_admin_session', JSON.stringify({
							loggedIn: true,
							username: response.user,
							loginTime: new Date().toISOString()
						}));

						// Remember me
						if(remember){
							localStorage.setItem('rw_admin_remember', JSON.stringify({ username: response.user }));
						}else{
							localStorage.removeItem('rw_admin_remember');
						}

						// Redirect
						window.location.href = "admin/index.php";

					}else{

						btn.classList.remove('loading');
						errorEl.classList.add('show');
						document.getElementById('loginErrorMsg').textContent = "Invalid username or password. Please try again.";

						// Shake effect
						document.getElementById('loginForm').style.animation = 'shake .4s ease';
						setTimeout(() => {
							document.getElementById('loginForm').style.animation = '';
						}, 400);
					}
				},
				error: function(){
					btn.classList.remove('loading');
					alert("Server error");
				}
			});


		}

    // Shake animation
    const style = document.createElement('style');
    style.textContent = '@keyframes shake{0%,100%{transform:translateX(0)}20%,60%{transform:translateX(-8px)}40%,80%{transform:translateX(8px)}}';
    document.head.appendChild(style);

    // Enter key support
    document.getElementById('loginPass').addEventListener('keydown', e => {
        if(e.key === 'Enter') document.getElementById('loginForm').requestSubmit();
    });