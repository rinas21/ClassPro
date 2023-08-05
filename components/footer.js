const footerTemplate = document.createElement("template");

footerTemplate.innerHTML = `
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  </head>
  <style>
    footer {
      background: #333;
      color: #fff;
      padding: 40px 0;
      text-align: center;
    }

    .footer-content {
      padding: 0 20px;
    }

    .footer-content h3 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .footer-content p {
      font-size: 14px;
      margin-bottom: 20px;
    }

    .socials {
      list-style: none;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 30px;
    }

    .socials li {
      margin: 0 10px;
    }

    .socials a {
      text-decoration: none;
      color: #fff;
      border: 2px solid #fff;
      padding: 8px;
      border-radius: 50%;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .socials a i {
      font-size: 20px;
      width: 20px;
    }

    .socials a:hover {
      background-color: #fff;
      color: #333;
    }

    .footer-menu {
      display: flex;
      justify-content: center;
      align-items: center;
      list-style: none;
      padding: 0;
      margin: 20px 0;
    }

    .footer-menu ul {
      display: flex;
      justify-content: center;
      align-items: center; /* Align items vertically in the middle */
      margin: 20px 0;
      padding: 0;
      list-style: none;
    }

    .footer-menu ul li {
      margin: 0 15px; /* Add space between menu items */
    }

    .footer-menu ul li a {
      color: #ccc;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-menu ul li a:hover {
      color: #fff;
    }
  </style>
  <footer>
    <div class="footer-content">
      <h3>ClassPro</h3>
      <p>
        ClassPro is a platform that helps students to learn and improve their skills.
      </p>
      <ul class="socials">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
      </ul>
      <ul class="footer-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
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
