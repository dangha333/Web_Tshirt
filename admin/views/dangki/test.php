<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng ký Client</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="views/auth/style.css">
  <script data-cfasync="false"
    nonce="7c3e3094-7a7b-4e93-8a9e-8b6d28fa31d2">
    try {
      (function(w, d) {
        ! function(ne, nf, ng, nh) {
          if (ne.zaraz) console.error("zaraz is loaded twice");
          else {
            ne[ng] = ne[ng] || {};
            ne[ng].executed = [];
            ne.zaraz = {
              deferred: [],
              listeners: []
            };
            ne.zaraz._v = "5823";
            ne.zaraz._n = "7c3e3094-7a7b-4e93-8a9e-8b6d28fa31d2";
            ne.zaraz.q = [];
            ne.zaraz._f = function(ni) {
              return async function() {
                var nj = Array.prototype.slice.call(arguments);
                ne.zaraz.q.push({
                  m: ni,
                  a: nj
                })
              }
            };
            for (const nk of ["track", "set", "debug"]) ne.zaraz[nk] = ne.zaraz._f(nk);
            ne.zaraz.init = () => {
              var nl = nf.getElementsByTagName(nh)[0],
                nm = nf.createElement(nh),
                nn = nf.getElementsByTagName("title")[0];
              nn && (ne[ng].t = nf.getElementsByTagName("title")[0].text);
              ne[ng].x = Math.random();
              ne[ng].w = ne.screen.width;
              ne[ng].h = ne.screen.height;
              ne[ng].j = ne.innerHeight;
              ne[ng].e = ne.innerWidth;
              ne[ng].l = ne.location.href;
              ne[ng].r = nf.referrer;
              ne[ng].k = ne.screen.colorDepth;
              ne[ng].n = nf.characterSet;
              ne[ng].o = (new Date).getTimezoneOffset();
              if (ne.dataLayer)
                for (const no of Object.entries(Object.entries(dataLayer).reduce(((np, nq) => ({
                    ...np[1],
                    ...nq[1]
                  })), {}))) zaraz.set(no[0], no[1], {
                  scope: "page"
                });
              ne[ng].q = [];
              for (; ne.zaraz.q.length;) {
                const nr = ne.zaraz.q.shift();
                ne[ng].q.push(nr)
              }
              nm.defer = !0;
              for (const ns of [localStorage, sessionStorage]) Object.keys(ns || {}).filter((nu => nu.startsWith("_zaraz_"))).forEach((nt => {
                try {
                  ne[ng]["z_" + nt.slice(7)] = JSON.parse(ns.getItem(nt))
                } catch {
                  ne[ng]["z_" + nt.slice(7)] = ns.getItem(nt)
                }
              }));
              nm.referrerPolicy = "origin";
              nm.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(ne[ng])));
              nl.parentNode.insertBefore(nm, nl)
            };
            ["complete", "interactive"].includes(nf.readyState) ? zaraz.init() : ne.addEventListener("DOMContentLoaded", zaraz.init)
          }
        }(w, d, "zarazData", "script");
        window.zaraz._p = async br => new Promise((bs => {
          if (br) {
            br.e && br.e.forEach((bt => {
              try {
                const bu = d.querySelector("script[nonce]"),
                  bv = bu?.nonce || bu?.getAttribute("nonce"),
                  bw = d.createElement("script");
                bv && (bw.nonce = bv);
                bw.innerHTML = bt;
                bw.onload = () => {
                  d.head.removeChild(bw)
                };
                d.head.appendChild(bw)
              } catch (bx) {
                console.error(`Error executing script: ${bt}\n`, bx)
              }
            }));
            Promise.allSettled((br.f || []).map((by => fetch(by[0], by[1]))))
          }
          bs()
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
  <div class="login-form">
    <h1 class="login-title">T-Shirt</h1>

    <form action="?act=check-dang-ky" method="post">
      <div class="input-box">
        <i class='bx bxs-user'></i>
        <input type="text" name="name" placeholder="Hãy nhập vào họ tên">
      </div>

      <div class="input-box">
        <i class='bx bxs-envelope'></i>
        <input type="email" name="email" placeholder="Hãy nhập vào email">
      </div>

      <div class="input-box">
        <i class='bx bxs-phone'></i>
        <input type="text" name="phone" placeholder="Hãy nhập vào số điện thoại">
      </div>

      <div class="input-box">
        <i class='bx bxs-lock-alt'></i>
        <input type="password" name="password" placeholder="Hãy nhập vào mật khẩu">
      </div>

      <button class="login-btn" type="submit">Đăng ký</button>


      <p class="register">
        Đã có tài khoản? <a href="?act=dang-nhap">Đăng nhập</a>
      </p>

      <div class="error-message">
        <?php
        if ($_SESSION && $_SESSION['flash']) {
          echo $_SESSION['flash'];
        }
        ?>
        <div class="err"></div>

    </form>
    <div class="background">
      <?php if (isset($_SESSION['eror'])) { ?>
        <p class="text-danger"><?= $_SESSION['error'] ?></p>
      <?php } else { ?>
        <p class="login-box-msg"></p>

      <?php } ?>
      <div class="shape"></div>
      <div class="shape"></div>
    </div>
  </div>
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>

</body>

</html>