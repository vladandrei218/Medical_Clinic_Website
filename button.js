function toggleDarkMode() {
    const body = document.body;
    const darkModeToggle = document.getElementById('darkmode-toggle');
  
    body.classList.toggle('dark-mode');
  
    if (body.classList.contains('dark-mode')) {
      darkModeToggle.checked = true;
      localStorage.setItem('darkMode', 'true');
    } else {
      darkModeToggle.checked = false;
      localStorage.setItem('darkMode', 'false');
    }
  }
  function applyDarkModeState() {
    const darkModeState = localStorage.getItem('darkMode');
    const body = document.body;
    const darkModeToggle = document.getElementById('darkmode-toggle');
  
    if (darkModeState === 'true') {
      body.classList.add('dark-mode');
      darkModeToggle.checked = true;
    } else {
      body.classList.remove('dark-mode');
      darkModeToggle.checked = false;
    }
  }
  applyDarkModeState();
  