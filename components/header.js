const headerTemplate = document.createElement("template");

headerTemplate.innerHTML = `
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: cursive;
    }

    a {
      text-decoration: none;
    }

    li {
      list-style: none;
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: #9896f1;
      color: #fff;
    }

    .nav-links a {
      color: #fff;
    }

    .logo {
      font-size: 32px;
    }

    .menu {
      display: flex;
      gap: 1em;
      font-size: 18px;
    }

    .menu li {
      padding: 5px 14px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .menu li:hover {
      background-color: #4ca9a9;
    }

    .services {
      position: relative;
    }

    .dropdown {
      background-color: #018585;
      padding: 1em 0;
      position: absolute;
      display: none;
      border-radius: 8px;
      top: 35px;
      z-index: 1;
    }

    .dropdown-group {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10px;
    }

    .dropdown-group li {
      margin: 5px 0;
    }

    .dropdown li+li {
      margin-top: 10px;
    }

    .dropdown li {
      padding: 0.5em 1em;
      width: 8em;
      text-align: center;
    }

    .dropdown li:hover {
      background-color: #4ca9a9;
    }

    .services:hover .dropdown {
      display: block;
    }

    input[type="checkbox"] {
      display: none;
    }

    .three-line {
      display: none;
      font-size: 24px;
      user-select: none;
    }

    @media (max-width: 768px) {
      .menu {
        display: none;
        position: absolute;
        background-color: #9896f1;
        right: 0;
        left: 0;
        text-align: center;
        padding: 16px 0;
      }

      .menu li:hover {
        display: inline-block;
        background-color: #4ca9a9;
        transition: background-color 0.3s ease;
      }

      .menu li+li {
        margin-top: 12px;
      }

      input[type="checkbox"]:checked~.menu {
        display: block;
      }

      .three-line {
        display: block;
      }

      .dropdown {
        left: 50%;
        top: 30px;
        transform: translateX(-50%);
      }

      .dropdown li:hover {
        background-color: #8ef6e4;
      }
    }
  </style>
  <header>
    <nav class="navbar">
      <div class="logo">ClassPro</div>
      <ul class="nav-links">
        <input type="checkbox" id="checkbox_toggle">
        <label for="checkbox_toggle" class="three-line">&#9776;</label>
        <div class="menu">
          <li><a href="/">Home</a></li>
          <li><a href="/">About</a></li>
          <li class="services">
            <a href="/">Features</a>
            <ul class="dropdown">
              <li><a href="/">Student Data Analysis</a></li>
              <li><a href="/">Events</a></li>
              <li><a href="/">Grades</a></li>
              <li><a href="/">Assignments</a></li>
              <li><a href="/">Progress Tracking</a></li>
              <li><a href="/">Communication Platform</a></li>
            </ul>
          </li>
          <li><a href="/">Contact</a></li>
        </div>
      </ul>
    </nav>
  </header>
`;

class Header extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    const shadowRoot = this.attachShadow({ mode: "closed" });

    shadowRoot.appendChild(headerTemplate.content);
  }
}

customElements.define("header-component", Header);
