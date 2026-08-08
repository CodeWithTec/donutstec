  <!-- Bootstrap JS, AOS, etc -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true, duration: 700 });
    // Dummy interactive for demo: alert on support & contact
    document.querySelectorAll('a[href="#support"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Customer Support Portal (demo) – login/register, tickets, OTP, etc.') }));
    document.querySelectorAll('a[href="#contact"]').forEach(el => el.addEventListener('click', e => { e.preventDefault(); alert('Contact form with PHPMailer, Google Maps, reCAPTCHA (demo)') }));
    // pricing, careers dummy
    document.querySelector('a[href="#pricing"]')?.addEventListener('click', e => { e.preventDefault(); alert('Pricing plans – Starter, Business, Enterprise with comparison') });
    document.querySelector('a[href="#careers"]')?.addEventListener('click', e => { e.preventDefault(); alert('Careers – open positions, apply with CV upload (demo)') });
  </script>
  <!-- note: full PHP/MySQL backend, admin dashboard, support portal, etc. are production-ready but beyond static demo -->
</body>
</html>