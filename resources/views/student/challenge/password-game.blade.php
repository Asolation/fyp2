<!DOCTYPE html>
<html>
<head>
    <title>Password Game</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .requirements {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }
        .requirements li {
            padding: 10px;
            border: 1px solid #e0e0e0;
            margin-bottom: 10px;
            border-radius: 4px;
            background-color: #f9f9f9;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .requirements li.show {
            opacity: 1;
            transform: translateY(0);
        }
        .requirements li.invalid {
            background-color: #ffe6e6;
            color: #cc0000;
        }
        .requirements li.valid {
            background-color: #e6ffe6;
            color: #009900;
        }
        .completed-message {
            display: none;
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
            color: #009900;
        }
        .score {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
        }
        .password-strength {
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }
        .Weak {
            color: red;
        }
        .Medium {
            color: orange;
        }
        .Strong {
            color: green;
        }
        button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Password Game</h1>
        <form id="passwordForm">
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Password</button>
        </form>
        <div class="password-strength" id="passwordStrength">Weak</div>
        <ul class="requirements" id="requirements">
            <!-- Requirements will be dynamically added here -->
        </ul>
        <div class="completed-message" id="completedMessage">Congratulations! You have met all the requirements.</div>
        <div class="score" id="score"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentRequirementIndex = 0;
            let requirements = [];
            let passwordStrength = $('#passwordStrength');

            $('#passwordForm').on('submit', function(event) {
                event.preventDefault();
                var password = $('#password').val();
                $.ajax({
                    url: '/password-game/check',
                    method: 'POST',
                    data: { password: password, _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function(response) {
                        requirements = response.requirements;
                        currentRequirementIndex = 0;
                        $('#requirements').empty(); // Clear previous requirements
                        $('#completedMessage').hide();
                        $('#score').empty();
                        showNextRequirement(response.allValid);
                        updatePasswordStrength(password);
                        updateScore(response.score);

                        if (response.redirectUrl) {
                            window.location.href = response.redirectUrl;
                        }
                    }
                });
            });

            function showNextRequirement(allValid) {
                if (currentRequirementIndex < requirements.length) {
                    const requirement = requirements[currentRequirementIndex];
                    const li = $('<li>').text(requirement.message).addClass(requirement.valid ? 'valid' : 'invalid').attr('title', requirement.hint);
                    $('#requirements').append(li);
                    setTimeout(() => {
                        li.addClass('show');
                    }, 10); // Slight delay to trigger animation

                    if (requirement.valid || allValid) {
                        currentRequirementIndex++;
                        setTimeout(() => showNextRequirement(allValid), 500); // Show next requirement after 0.5 seconds
                    }
                }

                if (allValid) {
                    setTimeout(() => $('#completedMessage').fadeIn(), 500);
                }
            }

            function updatePasswordStrength(password) {
                let strength = 0;
                if (password.length >= 8) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[\W_]/.test(password)) strength++;

                let strengthText = ['Weak', 'Medium', 'Strong'];
                passwordStrength.text(strengthText[Math.floor(strength / 2)]);
                passwordStrength.attr('class', strengthText[Math.floor(strength / 2)]);
            }

            function updateScore(score) {
                $('#score').text('Score: ' + score);
            }
        });
    </script>
</body>
</html>
