document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("theme-toggle");
  const icon = document.getElementById("theme-icon");
  const linkId = "dark-css";
  const darkHref = "/posts/wp-content/themes/Less/dark.css";

  function setIcon(theme) {
    icon.textContent = theme === "dark" ? "🌞" : "🌙";
    document.body.classList.toggle("dark", theme === "dark");
  }

  function applyDark() {
    if (!document.getElementById(linkId)) {
      const link = document.createElement("link");
      link.id = linkId;
      link.rel = "stylesheet";
      link.href = darkHref;
      document.head.appendChild(link);
    }
    localStorage.setItem("theme", "dark");
    setIcon("dark");
  }

  function removeDark() {
    const link = document.getElementById(linkId);
    if (link) link.remove();
    localStorage.setItem("theme", "light");
    setIcon("light");
  }

  function toggleTheme() {
    if (localStorage.getItem("theme") === "dark") {
      removeDark();
    } else {
      applyDark();
    }
  }

  if (toggleBtn) {
    toggleBtn.addEventListener("click", toggleTheme);
  }

  // Initial state
  if (localStorage.getItem("theme") === "dark") {
    applyDark();
  } else {
    setIcon("light");
  }
});