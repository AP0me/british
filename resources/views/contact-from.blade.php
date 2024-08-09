<form class="contact-form" onsubmit="return submitForm(event)">
  <div class="free-info">
    Learn free information
  </div>
  <input type="text" class="first-name" placeholder="First Name" required>
  <input type="text" class="last-name" placeholder="Last Name" required>
  <input type="email" class="email" placeholder="Email" required>
  <input type="tel" class="mobile" placeholder="Mobile" required>
  <select required>
    <option value="">Select a branch</option>
    <option value="Baku">Baku</option>
    <option value="Sumqayıt">Sumqayıt</option>
    <option value="Zaqatala">Zaqatala</option>
  </select>
  <input type="submit" class="info-submit" value="Submit">
</form>

<script>
  const form = document.querySelector('.contact-form');
  function submitForm(event) {
    event.preventDefault();
    const formData = {
      first_name: form.querySelector('.first-name').value,
      last_name: form.querySelector('.last-name').value,
      email: form.querySelector('.email').value,
      mobile: form.querySelector('.mobile').value,
      branch: form.querySelector('select').value,
      _token: '{{ csrf_token() }}'
    };
    fetch('/contact', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      withCredentials: true,
      body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
      console.log('Success:', data);
    })
    .catch(error => {
      console.error('Error:', error);
    });
    return false;
  }
</script>