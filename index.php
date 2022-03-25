<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initialscale=1.0" />
    <title>VITEEE Registration Portal</title>
    <style>
        * {
            margin: 0;
            border: 0;
            box-sizing: border-box;
            outline:none;
        }

        section {
            height: 100vh;
            width: 100%;
            background-color: lightblue;
        }

        .section-title {
            height: 10%;
            padding: 0 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
        }

        .section-content {
            height: 90%;
            padding: 0 10rem;
        }

        .section-content form input {
            border: 2px solid black;
            background: transparent;
            color: black;
        }

        .section-content form select {
            width: 11rem;
            border: 2px solid black;
            background: transparent;
            color: #2b2118;
        }

        .section-content form select option {
            border: 1px solid #b3b6b7;
            background: transparent;
            color: black;
        }

        .section-content form {
            /* background-color: beige; */
            height: 30%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .section-content form table td {
            padding: 0 2.5rem;
        }

        form button {
            text-align: center;
            background: transparent;
            border: 2px solid black;
            color: black;
            cursor: pointer;
        }

        #tableWrapper {
            height: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <section>
        <div class="section-title">
            <h1>VITEEE Registration</h1>
        </div>
        <div class="section-content">
            <form method="get">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" id="name" required />
                        </td>
                    </tr>
                    <tr>
                        <td>Registration Number</td>
                        <td>
                            <input type="text" name="regno" id="regno" required />
                        </td>
                    </tr>
                    <tr>
                        <td>Course</td>
                        <td>
                            <select name="course" id="course">
                                <option value="Computer Science">
                                    Computer Science Engineering
                                </option>
                                <option value="Biotechnology">Biotechnology</option>
                                <option value="Chemical Engineering">
                                    Chemical Engineering
                                </option>
                                <option value="Civil Engineering">Civil
                                    Engineering</option>
                                <option value="Electrical and Electronics">
                                    ELectrical and Electronics Enginnering
                                </option>
                                <option value="Information Technology">
                                    Information Technology
                                </option>
                                <option value="Mechanical">Mechanical
                                    Engineering</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Campus</td>
                        <td>
                            <select name="campus" id="campus">
                                <option value="Vellore">Vellore Campus</option>
                                <option value="Chennai">Chennai Campus</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Marks</td>
                        <td>
                            <input type="number" name="marks" id="marks" required />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button id="submit" onclick="event.preventDefault();">
                                Submit
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="tableWrapper">
                <div id="viteeeTable"></div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("submit").addEventListener("click",function () {
                let name = document.getElementById("name").value;
                let regno = document.getElementById("regno").value;
                let course = document.getElementById("course").value;
                let marks = document.getElementById("marks").value;
                let campus = document.getElementById("campus").value;
                let xhr = new XMLHttpRequest();
                xhr.open(
                    "GET",
                    "form.php?name=" +
                    name +
                    "&regno=" +
                    regno +
                    "&course=" +
                    course +
                    "&marks=" +
                    marks +
                    "&campus=" +
                    campus
                );
                xhr.onload = function () {
                    document.getElementById("viteeeTable").innerHTML =
                        this.responseText;
                };
                xhr.send();
            });
    </script>
</body>
</html>