document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("theme-toggle");
  const icon = document.getElementById("theme-icon");
  const linkId = "dark-css";
  const darkHref = "/posts/wp-content/themes/Less/dark.css"; 

  // This function now targets the <html> element and updates the state
  function updateState(theme) {
    document.documentElement.classList.toggle("dark", theme === "dark");
    icon.textContent = theme === "dark" ? "🌞" : "🌙";
    localStorage.setItem("theme", theme);
  }

  function applyDarkStyles() {
    if (!document.getElementById(linkId)) {
      const link = document.createElement("link");
      link.id = linkId;
      link.rel = "stylesheet";
      link.href = darkHref;
      document.head.appendChild(link);
    }
    updateState("dark");
  }

  function removeDarkStyles() {
    const link = document.getElementById(linkId);
    if (link) link.remove();
    updateState("light");
  }

  function toggleTheme() {
    if (document.documentElement.classList.contains("dark")) {
      removeDarkStyles();
    } else {
      applyDarkStyles();
    }
  }

  if (toggleBtn) {
    toggleBtn.addEventListener("click", toggleTheme);
  }

  // Ensure the correct state is reflected on page load
  if (document.documentElement.classList.contains("dark")) {
    applyDarkStyles();
  } else {
    icon.textContent = "🌙";
  }
});