<!DOCTYPE html>
<html lang="en">
<!-- اینم htmlفورم لاگین هست -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
</head>

<body>
    <div class="bg-cover bg-gradient-to-br from-[#7337FF] via-[#000000] to-[#0C7EA8]">
        <div class="h-screen flex justify-center items-center backdrop-brightness-50">
            <div class="flex flex-col items-center space-y-8">
                <div>
                    <img src="https://res.cloudinary.com/dkt1t22qc/image/upload/v1742348949/Prestataires_Documents/smj7n1bdlpjsfsotwpco.png"
                        alt="TyBot Logo" class="cursor-pointer" />
                </div>
                <div class="rounded-[20px] w-80 p-8 bg-[#310D84]" style="box-shadow: -6px 3px 20px 4px #0000007d">
                    <h1 class="text-white text-3xl font-bold mb-4">Login</h1>
                    <form action="action_login.php" method="POST">
                        <div class="space-y-4">
                            <div>
                                <label for="email" class="text-white">user Address</label>
                                <input type="text" name="email" id="email" placeholder="user address"
                                    class="bg-[#8777BA] w-full p-2.5 rounded-md placeholder:text-gray-300 shadow-md shadow-blue-950"
                                    required aria-label="Enter your email address" />

                            </div>
                            <div>
                                <label for="password" class="text-white">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="bg-[#8777BA] w-full p-2.5 rounded-md placeholder:text-gray-300 shadow-md shadow-blue-950"
                                    required aria-label="Enter your password" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <span class="text-[#228CE0] text-[10px] ml-2 cursor-pointer">Forget Password?</span>
                        </div>
                        <div class="flex justify-center mb-4">
                            <button type="submit" name="login"
                                class="h-10 w-full cursor-pointer text-white rounded-md bg-gradient-to-br from-[#7336FF] to-[#3269FF] shadow-md shadow-blue-950">
                                Login
                            </button>
                        </div>
                    </form>
                    <div class="text-gray-300 text-center">
                        Don't have an account? <span class="text-[#228CE0] cursor-pointer">Sign up</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
