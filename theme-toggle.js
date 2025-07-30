// theme-toggle.js
(function () {
  const toggleBtn = document.getElementById("theme-toggle");
  const linkId = "dark-css";

  function applyDark() {
    if (!document.getElementById(linkId)) {
      const link = document.createElement("link");
      link.id = linkId;
      link.rel = "stylesheet";
      link.href = "/posts/wp-content/themes/Less/dark.css";
      document.head.appendChild(link);
    }
    localStorage.setItem("theme", "dark");
  }

  function removeDark() {
    const link = document.getElementById(linkId);
    if (link) link.remove();
    localStorage.setItem("theme", "light");
  }

  function toggleTheme() {
    if (localStorage.getItem("theme") === "dark") {
      removeDark();
    } else {
      applyDark();
    }
  }

  toggleBtn.addEventListener("click", toggleTheme);

  // Load preference
  if (localStorage.getItem("theme") === "dark") {
    applyDark();
  }
})();

