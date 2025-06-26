const icons = document.querySelectorAll('.icon');

  icons.forEach(icon => {
    const wrapper = icon.querySelector('.icon-wrapper');
    const img = icon.querySelector('img');
    const whiteIcon = img.dataset.white;
    const blueIcon = img.dataset.blue;

    // Initialize to white
    img.src = whiteIcon;

    // When page loads, auto-highlight current page
  const currentPath = window.location.pathname.split('/').pop();
  const href = icon.getAttribute('href');
  if (href === currentPath) {
    wrapper.classList.add('bg-white', 'rounded-lg', 'shadow-md', 'scale-110');
    img.src = blueIcon;
  }

    icon.addEventListener('click', () => {
    // Reset all icons
    icons.forEach(i => {
      const w = i.querySelector('.icon-wrapper');
      const im = i.querySelector('img');
      w.classList.remove('bg-white', 'rounded-lg', 'shadow-md', 'scale-110');
      im.src = im.dataset.white;
    });

wrapper.classList.add('bg-white', 'rounded-lg', 'shadow-md', 'scale-110');
    img.src = blueIcon;


      // Set active
      wrapper.classList.add('bg-white', 'rounded-lg', 'shadow-md', 'scale-110');
      img.src = blueIcon;
      activeIcon = icon;
    });

    // Handle hover out
    icon.addEventListener('mouseleave', () => {
      if (activeIcon !== icon) {
        img.src = whiteIcon;
      }
    });
  });
  const profileBtn = document.getElementById('profileDropdownBtn');
  const dropdown = document.getElementById('profileDropdown');

  profileBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    dropdown.classList.toggle('hidden');
  });

  // Close dropdown on outside click
  document.addEventListener('click', (e) => {
    if (!dropdown.classList.contains('hidden')) {
      dropdown.classList.add('hidden');
    }
  });

  // Animation on click (white box background)
  document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function () {
      // Remove active from all
      document.querySelectorAll('.dropdown-item').forEach(i => {
        i.classList.remove('bg-white');
      });
      // Add active to clicked
      this.classList.add('bg-white');
    });
  });
  // Modal controls
const viewProfileBtn = document.getElementById('viewProfileBtn');
const viewProfileModal = document.getElementById('viewProfileModal');
const closeModalBtn = document.getElementById('closeModalBtn');
const cancelBtn = document.getElementById('cancelBtn');

viewProfileBtn.addEventListener('click', (e) => {
  e.preventDefault();
  viewProfileModal.classList.remove('hidden');
});

closeModalBtn.addEventListener('click', () => {
  viewProfileModal.classList.add('hidden');
});

cancelBtn.addEventListener('click', () => {
  viewProfileModal.classList.add('hidden');
});

// Optional: clicking outside modal closes it
viewProfileModal.addEventListener('click', (e) => {
  if (e.target === viewProfileModal) {
    viewProfileModal.classList.add('hidden');
  }
});