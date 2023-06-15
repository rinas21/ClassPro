const footerTemplate = document.createElement("template");

footerTemplate.innerHTML = `
  <style>
    footer {
      position: relative;
      background: #838383;
      color: #fff;
      padding-top: 40px;
      margin-top: 180px auto; /* Add margin-top to create space between footer and content */
      max-height:280px;
    }

    .footer-content {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      text-align: center;
    }

    .footer-content h3 {
      font-size: 2.1rem;
      font-weight: 500;
      text-transform: capitalize;
      line-height: 3rem;
    }

    .footer-content p {
      max-width: 500px;
      margin: 10px auto;
      line-height: 28px;
      font-size: 14px;
      color: #cacdd2;
    }

    .socials {
      list-style: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 1rem 0 3rem 0;
    }

    .socials li {
      margin: 0 10px;
    }

    .socials a {
      text-decoration: none;
      color: #fff;
      border: 1.1px solid white;
      padding: 5px;
      border-radius: 50%;
    }

    .socials a i {
      font-size: 1.1rem;
      width: 20px;
      transition: color 0.4s ease;
    }

    .socials a:hover i {
      color: aqua;
    }

    .footer-bottom {
      background: #838383;
      padding: 20px;
      padding-bottom: 40px;
      text-align: center;
    }

    .footer-bottom p {
      font-size: 14px;
      word-spacing: 2px;
      text-transform: capitalize;
    }

    .footer-bottom p a {
      color: #44bae8;
      font-size: 16px;
      text-decoration: none;
    }

    .footer-bottom span {
      text-transform: uppercase;
      opacity: 0.4;
      font-weight: 200;
    }

    .footer-menu {
      float: right;
    }

    .footer-menu ul {
      display: flex;
    }

    .footer-menu ul li {
      padding-right: 10px;
      display: block;
    }

    .footer-menu ul li a {
      color: #cfd2d6;
      text-decoration: none;
    }

    .footer-menu ul li a:hover {
      color: #27bcda;
    }

    @media (max-width: 768px) {
      .footer-content {
        padding-bottom: 80px;
      }

      .socials {
        margin-bottom: 2rem;
      }

      .footer-menu ul {
        margin-top: 10px;
        margin-bottom: 20px;
      }

      footer {
        margin-top: 40px; /* Adjust margin-top as needed */
        padding-bottom: 80px; /* Increase padding-bottom to create space at the bottom of the footer */
      }
    }
  </style>
  <footer>
    <div class="footer-content">
      <h3>ClassPro</h3>
      <p>
        ClassPro is a platform that helps students to learn and improve their
        skills.
      </p>
      <ul class="socials">
        <li>
          <a href="#"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-google-plus"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-youtube"></i></a>
        </li>
        <li>
          <a href="#"><i class="fa fa-linkedin-square"></i></a>
        </li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>copyright &copy; <a href="#">ClassPro</a></p>
      <div class="footer-menu">
        <ul class="f-menu">
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Blog</a></li>
        </ul>
      </div>
    </div>
  </footer>
`;

class Footer extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    const fontAwesome = document.querySelector('link[href*="font-awesome"]');
    const shadowRoot = this.attachShadow({ mode: "closed" });

    if (fontAwesome) {
      shadowRoot.appendChild(fontAwesome.cloneNode());
    }

    shadowRoot.appendChild(footerTemplate.content.cloneNode(true));
  }
}

customElements.define("footer-component", Footer);
