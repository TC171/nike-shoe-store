<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css?v=3.2.0">

    <script data-cfasync="false" nonce="043af1d5-26cb-4982-9085-343a9074404c">
        try {
            (function (w, d) {
                ! function (bz, bA, bB, bC) {
                    if (bz.zaraz) console.error("zaraz is loaded twice");
                    else {
                        bz[bB] = bz[bB] || {};
                        bz[bB].executed = [];
                        bz.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        bz.zaraz._v = "5853";
                        bz.zaraz._n = "043af1d5-26cb-4982-9085-343a9074404c";
                        bz.zaraz.q = [];
                        bz.zaraz._f = function (bD) {
                            return async function () {
                                var bE = Array.prototype.slice.call(arguments);
                                bz.zaraz.q.push({
                                    m: bD,
                                    a: bE
                                })
                            }
                        };
                        for (const bF of ["track", "set", "debug"]) bz.zaraz[bF] = bz.zaraz._f(bF);
                        bz.zaraz.init = () => {
                            var bG = bA.getElementsByTagName(bC)[0],
                                bH = bA.createElement(bC),
                                bI = bA.getElementsByTagName("title")[0];
                            bI && (bz[bB].t = bA.getElementsByTagName("title")[0].text);
                            bz[bB].x = Math.random();
                            bz[bB].w = bz.screen.width;
                            bz[bB].h = bz.screen.height;
                            bz[bB].j = bz.innerHeight;
                            bz[bB].e = bz.innerWidth;
                            bz[bB].l = bz.location.href;
                            bz[bB].r = bA.referrer;
                            bz[bB].k = bz.screen.colorDepth;
                            bz[bB].n = bA.characterSet;
                            bz[bB].o = (new Date).getTimezoneOffset();
                            if (bz.dataLayer)
                                for (const bJ of Object.entries(Object.entries(dataLayer).reduce(((bK, bL) => ({
                                    ...bK[1],
                                    ...bL[1]
                                })), {}))) zaraz.set(bJ[0], bJ[1], {
                                    scope: "page"
                                });
                            bz[bB].q = [];
                            for (; bz.zaraz.q.length;) {
                                const bM = bz.zaraz.q.shift();
                                bz[bB].q.push(bM)
                            }
                            bH.defer = !0;
                            for (const bN of [localStorage, sessionStorage]) Object.keys(bN || {}).filter((bP => bP
                                .startsWith("_zaraz_"))).forEach((bO => {
                                    try {
                                        bz[bB]["z_" + bO.slice(7)] = JSON.parse(bN.getItem(bO))
                                    } catch {
                                        bz[bB]["z_" + bO.slice(7)] = bN.getItem(bO)
                                    }
                                }));
                            bH.referrerPolicy = "origin";
                            bH.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bz[bB])));
                            bG.parentNode.insertBefore(bH, bG)
                        };
                        ["complete", "interactive"].includes(bA.readyState) ? zaraz.init() : bz.addEventListener(
                            "DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async dq => new Promise((dr => {
                    if (dq) {
                        dq.e && dq.e.forEach((ds => {
                            try {
                                const dt = d.querySelector("script[nonce]"),
                                    du = dt?.nonce || dt?.getAttribute("nonce"),
                                    dv = d.createElement("script");
                                du && (dv.nonce = du);
                                dv.innerHTML = ds;
                                dv.onload = () => {
                                    d.head.removeChild(dv)
                                };
                                d.head.appendChild(dv)
                            } catch (dw) {
                                console.error(`Error executing script: ${ds}\n`, dw)
                            }
                        }));
                        Promise.allSettled((dq.f || []).map((dx => fetch(dx[0], dx[1]))))
                    }
                    dr()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="./assets/index2.html" class="h1"><b>Admin </b>Login</a>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger login-box-msg"> <?= $_SESSION['error'] ?></p>
                <?php } else { ?>
                    <p class="login-box-msg">Vui lòng đăng nhập</p>
                <?php } ?>
                <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="#">Quên mật khẩu</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="./assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
    
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"94cee90e6c390442","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.5.0","token":"2437d112162f4ec4b63c3ca0eb38fb20"}'
        crossorigin="anonymous">
    </script>
</body>

</html>