<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng Nhập Admin</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <script data-cfasync="false" nonce="7c3e3094-7a7b-4e93-8a9e-8b6d28fa31d2">
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

<style>
  /* Giao diện toàn trang */
  body {
    background-color: #1e3a8a; /* Màu nền xanh nước biển đậm */
    font-family: 'Poppins', sans-serif;
  }

  /* Hình nền phía sau */
  .background .shape:first-child {
    background: linear-gradient(#2563eb, #1e40af); /* Gradient xanh nước biển */
  }

  .background .shape:last-child {
    background: linear-gradient(to right, #60a5fa, #3b82f6); /* Gradient xanh nhạt */
  }

  /* Form đăng nhập */
  form {
    height: 520px;
    width: 400px;
    background-color: rgba(30, 58, 138, 0.13); /* Form trong suốt với tông xanh nước biển */
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(30, 58, 138, 0.2);
    box-shadow: 0 0 40px rgba(30, 58, 138, 0.6);
    padding: 50px 35px;
  }

  form * {
    color: #ffffff; /* Chữ màu trắng */
    letter-spacing: 0.5px;
  }

  form h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
  }

  label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
  }

  input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
    color: #ffffff; /* Chữ màu trắng */
  }

  ::placeholder {
    color: #cbd5e1; /* Màu placeholder xám nhạt */
  }

  button {
    width: 100%;
    background-color: #2563eb; /* Màu xanh nước biển đậm */
    color: #ffffff; /* Chữ màu trắng */
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  button:hover {
    background-color: #1e40af; /* Màu xanh đậm hơn khi hover */
  }

  /* Nút đăng ký */
  .register-btn {
    display: inline-block; /* Tách riêng nút Đăng ký */
    margin-top: 20px;
    font-size: 14px;
    padding: 10px 20px;
    background-color: #60a5fa; /* Màu xanh nhạt */
    color: #ffffff; /* Chữ màu trắng */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none; /* Xóa gạch chân */
    text-align: center;
    transition: background-color 0.3s;
  }

  .register-btn:hover {
    background-color: #2563eb; /* Màu xanh đậm khi hover */
  }

  .register-btn a {
    text-decoration: none; /* Xóa gạch chân */
    color: #ffffff; /* Chữ màu trắng */
  }

  /* Thông báo lỗi */
  .error-message {
    margin: 1em 0;
    color: #ef4444; /* Màu đỏ nổi bật */
  }
</style>


<body class="hold-transition login-page">
  <div class="background">
    <?php if (isset($_SESSION['eror'])) { ?>
      <p class="text-danger"><?= $_SESSION['error'] ?></p>
    <?php } else { ?>
      <p class="login-box-msg" style="color: white;">Vui lòng đăng nhập</p>

    <?php } ?>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="?act=check-login-admin" method="post">

    <label for="email">Username</label>
    <input type="gmail" placeholder="Email or Phone" id="email" name="email">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">
    <div class="error-message">
      <?php
    if (isset($_SESSION['flash'])) {
      echo $_SESSION['flash'];
  }
      ?>

    </div>


    <button style="margin-top: 50px;" type="submit">Đăng nhập</button>
    <button class="register-btn">
      <a href="?act=dang-ky">Đăng ký</a>
    </button>

    <div class="err"></div>


  </form>
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>