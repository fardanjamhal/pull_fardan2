// helper-validasi-nik.js

// Tambahkan CSS ke dalam <head>
const style = document.createElement("style");
style.innerHTML = `
  input.is-valid {
    border: 2px solid #28a745 !important;
  }

  input.is-invalid {
    border: 2px solid #dc3545 !important;
  }

  .shake {
    animation: shake 0.3s;
  }

  @keyframes shake {
    0%   { transform: translateX(0); }
    25%  { transform: translateX(-4px); }
    50%  { transform: translateX(4px); }
    75%  { transform: translateX(-4px); }
    100% { transform: translateX(0); }
  }
`;
document.head.appendChild(style);

// Fungsi: hanya angka
function hanyaAngka(evt) {
  const charCode = evt.which ? evt.which : event.keyCode;
  return !(charCode > 31 && (charCode < 48 || charCode > 57));
}

// Validasi NIK
const nikShakeFlags = {};

function validasiNIK(input) {
  const id = input.id;
  const nik = input.value.trim();

  if (nik.length === 16) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
  } else {
    input.classList.remove("is-valid");
    input.classList.add("is-invalid");

    // Shake hanya saat angka pertama
    if (nik.length === 1 && !nikShakeFlags[id]) {
      input.classList.add("shake");
      nikShakeFlags[id] = true;
      setTimeout(() => input.classList.remove("shake"), 300);
    }
  }
}
