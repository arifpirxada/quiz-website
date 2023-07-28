
// Script for sliding label of input elements 

let loginItem = document.querySelectorAll(".loginItem")
Array.from(loginItem).forEach(element => {
    element.addEventListener('click', (e) => {
        let item = e.target.parentNode.getElementsByTagName('label')[0]
        item.style.transform = "translate(0px,-20px)";
    })
})

// Script to deal with database using fetch 

// * For singup page
// document.querySelector(`.signupForm`).insertAdjacentHTML('beforeend', '<p class="noselection noselSignup">Please Select and option!</p>');

// function for verification


if (document.querySelector("#signupbtn")) {

    let singupbtn = document.querySelector("#signupbtn")
    signupbtn.addEventListener("click", () => {

        let gotEmail = document.querySelector("#signInputEmail1").value
        let signPass = document.querySelector("#signInputPassword1").value
        let signcPass = document.querySelector("#csignInputPassword2").value
        let alertContainer = document.querySelector(".alertdiv")

        var signupForm = document.querySelector(".signupForm")

        let regex = /.*@.*\..*/
        var arrEmail = regex.exec(gotEmail)

        if (signEmail == "" || signPass == "" || signcPass == "") {
            alertContainer.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup">Please fill out all fields!</p>')
            setTimeout(() => {
                document.querySelector(".noselSignup").outerHTML = ""
            }, 3000)
        }
        else if (arrEmail == null) {
            alertContainer.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup">Please Enter a valid Email!</p>')
            setTimeout(() => {
                document.querySelector(".noselSignup").outerHTML = ""
            }, 3000)
        }
        else {

            var signEmail = arrEmail[0]

            var noSelect = document.querySelectorAll(".noselSignup");
            if (noSelect) {
                Array.from(noSelect).forEach((element) => {
                    element.parentNode.removeChild(element);
                })
            }


            if (signPass != signcPass) {
                alertContainer.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup">Passwords do not match!</p>')
                setTimeout(() => {
                    document.querySelector(".noselSignup").outerHTML = ""
                }, 3000)
            }
            else {
                signupbtn.innerHTML = "signing..."

                var data = {
                    'email': signEmail,
                    'password': signPass,
                }

                jsondata = JSON.stringify(data)

                fetch("userHandle/spHandle.php", {
                    method: "POST",
                    body: jsondata,
                    headers: {
                        'Content-Type': "application/json"
                    }
                })
                    .then((response) => response.text())
                    .then((data) => {
                        if (data == "yes") {
                            signupbtn.innerHTML = "signup"
                            alertContainer.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup">User already exists!</p>')
                            setTimeout(() => {
                                document.querySelector(".noselSignup").outerHTML = ""
                            }, 3000)
                        }
                        else {
                            window.location = "../index.php";

                            // signupForm.innerHTML = '<h5 class="heading-font logHeading mx-2">Otp verification</h5><div class="mb-3 signcontent"><label for="otpverify" style="margin-left: -152%;" id="otplabel" class="form-label logLabel">Enter otp</label><input type="email" required class="loginItem" id="otpverify" aria-describedby="emailHelp"><hr style="margin-bottom: -14px;" class="loghr evenwidth"></div><div id="techHelp" style="margin-left: 14%;" class="form-text">We have sent a verification code to your email</div><button class="btn btn-primary" style="margin-left: 125px;" id="otpbtn">Verify</button>'


                            // let otpverifyinput = document.querySelector("#otpverify")
                            // otpverifyinput.addEventListener("click", () => {
                            //     let otplabel = document.querySelector("#otplabel")
                            //     otplabel.style.transform = "translate(0px,-20px)"
                            // })


                            // let verifybtn = document.querySelector("#otpbtn")

                            // verifybtn.addEventListener("click",()=> {
                            //     let otpverifyvalue = document.querySelector("#otpverify").value

                            //     let otp = {
                            //         'userotp': otpverifyvalue
                            //     }
                            //     jsondt = JSON.stringify(otp)

                            //     fetch("spHandle.php", {
                            //         method: "POST",
                            //         body: jsondt,
                            //         headers: {
                            //             'Content-Type': 'application/json'
                            //         }
                            //     })
                            //     .then((res)=> res.text())
                            //     .then((data)=> {
                            //         console.log("yes otp send hogaya",data)
                            //     })

                            // })

                        }
                    })


            }
        }

    })
}

// * For Login page

if (document.querySelector(".logbtn")) {

    let logbtn = document.querySelector(".logbtn")
    logbtn.addEventListener("click", () => {

        let logEmail = document.querySelector("#loginInputEmail1").value
        let logPass = document.querySelector("#loginInputPassword1").value
        let showAlert = document.querySelector(".alertdiv")

        var logForm = document.querySelector(".logForm")

        if (logEmail == "" || logPass == "") {
            showAlert.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup noselLogin">Please fill out all fields!</p>')
            setTimeout(() => {
                document.querySelector(".noselLogin").outerHTML = ""
            }, 3000)
        }
        else {
            logbtn.innerHTML= "Logging..."

            var noSelect = document.querySelectorAll(".noselLogin");
            if (noSelect) {
                Array.from(noSelect).forEach((element) => {
                    element.parentNode.removeChild(element);
                })
            }

            let mydata = {
                'email': logEmail,
                'password': logPass
            }
            jsondata = JSON.stringify(mydata)

            fetch("userHandle/loghandle.php", {
                method: "POST",
                body: jsondata,
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then((response) => response.json())
                .then((data) => {
                    let userFound = data['noUser']

                    if (userFound == "found") {
                        let mypass = data['password']

                        if (mypass == 'matched') {
                            window.location = "../index.php";
                        }
                        else {
                            logbtn.innerHTML= "Login"
                            showAlert.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup noselLogin">Wrond password!</p>')
                            setTimeout(() => {
                                document.querySelector(".noselLogin").outerHTML = ""
                            }, 3000)
                        }

                    }
                    else {
                        logbtn.innerHTML= "Login"
                        showAlert.insertAdjacentHTML("beforeend", '<p class="noselection noselSignup noselLogin">User not found!</p>')
                        setTimeout(() => {
                            document.querySelector(".noselLogin").outerHTML = ""
                        }, 3000)
                    }

                })

        }





    })
}

// function to retake a quiz
if (document.querySelector(".questType")) {
    var qType = document.querySelector(".questType").value
}
function retake() {
    let takeBtn = document.querySelector(".takeAgainbtn")
    takeBtn.innerHTML = "Wait..."
    let data = {
        'retook': 'yes'
    }

    fetch("userHandle/retake.php", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then((res) => res.text())
        .then((dt) => {
            window.location = `questions.php?type=${qType}`;
        })
        
}





