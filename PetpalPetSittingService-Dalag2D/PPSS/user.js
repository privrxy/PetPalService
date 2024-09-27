document.addEventListener('DOMContentLoaded', () => {
  const appointmentModal = document.getElementById('appointmentModal');
  const historyModal = document.getElementById('historyModal');
  const editProfileModal = document.getElementById('editProfileModal');

  const appointmentLink = document.getElementById('appointmentLink');
  const historyLink = document.getElementById('historyLink');
  const editProfileLink = document.getElementById('editProfileLink');

  const closeAppointmentModal = document.getElementById('closeAppointmentModal');
  const closeHistoryModal = document.getElementById('closeHistoryModal');
  const closeEditProfileModal = document.getElementById('closeEditProfileModal');
  const closeEditInfoModal = document.getElementById('closeEditInfoModal');

  const editProfileForm = document.getElementById('editProfileForm');
  const profileView = document.getElementById('profileView');

  // Attach event listeners para buksan ang mga modals
  appointmentLink.addEventListener('click', () => {
      closeAllModals();
      openAppointmentModal();
  });

  historyLink.addEventListener('click', () => {
      closeAllModals();
      openHistoryModal();
  });

  editProfileLink.addEventListener('click', () => {
      closeAllModals();
      openEditProfileModal();
  });

  // Attach event listeners para isara ang mga modals
  closeAppointmentModal.addEventListener('click', () => {
      appointmentModal.style.display = 'none';
  });

  closeHistoryModal.addEventListener('click', () => {
      historyModal.style.display = 'none';
  });

  closeEditProfileModal.addEventListener('click', () => {
      editProfileModal.style.display = 'none';
  });

  closeEditInfoModal.addEventListener('click', () => {
    editProfileModal.style.display = 'none';
});


  // Handle edit profile form display
  const editBtns = document.querySelectorAll('.editBtn');

  editBtns.forEach(editBtn => {
      editBtn.addEventListener('click', (event) => {
          const row = event.target.closest('tr');
          const cells = row.querySelectorAll('td');

          // Lagyan ng laman ang edit profile form fields
          document.getElementById('editFirstName').value = cells[0].textContent.trim();
          document.getElementById('editLastName').value = cells[1].textContent.trim();
          document.getElementById('editMiddleName').value = cells[2].textContent.trim();
          document.getElementById('editEmail').value = cells[3].textContent.trim();
          document.getElementById('editContactNum').value = cells[4].textContent.trim();
          document.getElementById('editId').value = event.target.getAttribute('data-id');

          // Ipakita ang edit profile form at itago ang profile view
          profileView.style.display = 'none';
          editProfileForm.style.display = 'block';

          // Buksan ang edit profile modal
          editProfileModal.style.display = 'block';
      });
  });

  // Handle closing modals kapag nag-click sa labas ng modal
  window.addEventListener('click', (event) => {
      if (event.target === appointmentModal) {
          appointmentModal.style.display = 'none';
      }
      if (event.target === historyModal) {
          historyModal.style.display = 'none';
      }
      if (event.target === editProfileModal) {
          editProfileModal.style.display = 'none';
      }
  });

  // Function para buksan ang mga modals
  function openAppointmentModal() {
      appointmentModal.style.display = 'block';
  }

  function openHistoryModal() {
      historyModal.style.display = 'block';
  }

  function openEditProfileModal() {
      editProfileModal.style.display = 'block';
  }

  // Function para isara lahat ng modals
  function closeAllModals() {
      appointmentModal.style.display = 'none';
      historyModal.style.display = 'none';
      editProfileModal.style.display = 'none';
  }

  // Function para bumalik sa home
  const backToHome = () => {
      if (confirm('Are you sure you want to logout?')) {
          window.location = 'home.php';
      }
  };

  document.getElementById('logoutBtn').addEventListener('click', backToHome);
});
