<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk menampilkan/menyembunyikan textarea
        function toggleTextarea(radioButton) {
            const targetName = radioButton.getAttribute('data-target');
            const textarea = document.querySelector(`textarea[name="${targetName}"]`);

            if (radioButton.value === 'tidak normal' && radioButton.checked) {
                textarea.style.display = 'block';
                textarea.required = true;
            } else if (radioButton.value === 'normal' && radioButton.checked) {
                textarea.style.display = 'none';
                textarea.required = false;
                textarea.value = '';
            }
        }

        // Event listener untuk semua radio button
        document.querySelectorAll('input[type="radio"][data-target]').forEach(function(radio) {
            if (radio.checked) {
                toggleTextarea(radio);
            }

            radio.addEventListener('change', function() {
                toggleTextarea(this);
            });
        });

        // Inisialisasi diagram gigi
        initTeethDiagram();
    });

    function showNextTab() {
        const activeTab = document.querySelector('#mcuTab .nav-link.active');
        const nextTab = activeTab.parentElement.nextElementSibling;

        if (nextTab) {
            const nextTabButton = nextTab.querySelector('button');
            const tab = new bootstrap.Tab(nextTabButton);
            tab.show();
        }
    }

    function showPreviousTab() {
        const activeTab = document.querySelector('#mcuTab .nav-link.active');
        const prevTab = activeTab.parentElement.previousElementSibling;

        if (prevTab) {
            const prevTabButton = prevTab.querySelector('button');
            const tab = new bootstrap.Tab(prevTabButton);
            tab.show();
        }
    }

    function resetForm() {
        document.querySelectorAll('.keterangan-textarea').forEach(function(textarea) {
            textarea.style.display = 'none';
            textarea.value = '';
        });
    }

    // Data gigi dengan sistem penomoran FDI
    const teethData = [
        // Gigi atas (1-16)
        {
            number: 18,
            name: "Molar 3 Atas Kanan",
            row: "upper",
            position: 0
        },
        {
            number: 17,
            name: "Molar 2 Atas Kanan",
            row: "upper",
            position: 1
        },
        {
            number: 16,
            name: "Molar 1 Atas Kanan",
            row: "upper",
            position: 2
        },
        {
            number: 15,
            name: "Premolar 2 Atas Kanan",
            row: "upper",
            position: 3
        },
        {
            number: 14,
            name: "Premolar 1 Atas Kanan",
            row: "upper",
            position: 4
        },
        {
            number: 13,
            name: "Caninus Atas Kanan",
            row: "upper",
            position: 5
        },
        {
            number: 12,
            name: "Incisivus 2 Atas Kanan",
            row: "upper",
            position: 6
        },
        {
            number: 11,
            name: "Incisivus 1 Atas Kanan",
            row: "upper",
            position: 7
        },
        {
            number: 21,
            name: "Incisivus 1 Atas Kiri",
            row: "upper",
            position: 8
        },
        {
            number: 22,
            name: "Incisivus 2 Atas Kiri",
            row: "upper",
            position: 9
        },
        {
            number: 23,
            name: "Caninus Atas Kiri",
            row: "upper",
            position: 10
        },
        {
            number: 24,
            name: "Premolar 1 Atas Kiri",
            row: "upper",
            position: 11
        },
        {
            number: 25,
            name: "Premolar 2 Atas Kiri",
            row: "upper",
            position: 12
        },
        {
            number: 26,
            name: "Molar 1 Atas Kiri",
            row: "upper",
            position: 13
        },
        {
            number: 27,
            name: "Molar 2 Atas Kiri",
            row: "upper",
            position: 14
        },
        {
            number: 28,
            name: "Molar 3 Atas Kiri",
            row: "upper",
            position: 15
        },

        // Gigi bawah (31-48)
        {
            number: 48,
            name: "Molar 3 Bawah Kiri",
            row: "lower",
            position: 0
        },
        {
            number: 47,
            name: "Molar 2 Bawah Kiri",
            row: "lower",
            position: 1
        },
        {
            number: 46,
            name: "Molar 1 Bawah Kiri",
            row: "lower",
            position: 2
        },
        {
            number: 45,
            name: "Premolar 2 Bawah Kiri",
            row: "lower",
            position: 3
        },
        {
            number: 44,
            name: "Premolar 1 Bawah Kiri",
            row: "lower",
            position: 4
        },
        {
            number: 43,
            name: "Caninus Bawah Kiri",
            row: "lower",
            position: 5
        },
        {
            number: 42,
            name: "Incisivus 2 Bawah Kiri",
            row: "lower",
            position: 6
        },
        {
            number: 41,
            name: "Incisivus 1 Bawah Kiri",
            row: "lower",
            position: 7
        },
        {
            number: 31,
            name: "Incisivus 1 Bawah Kanan",
            row: "lower",
            position: 8
        },
        {
            number: 32,
            name: "Incisivus 2 Bawah Kanan",
            row: "lower",
            position: 9
        },
        {
            number: 33,
            name: "Caninus Bawah Kanan",
            row: "lower",
            position: 10
        },
        {
            number: 34,
            name: "Premolar 1 Bawah Kanan",
            row: "lower",
            position: 11
        },
        {
            number: 35,
            name: "Premolar 2 Bawah Kanan",
            row: "lower",
            position: 12
        },
        {
            number: 36,
            name: "Molar 1 Bawah Kanan",
            row: "lower",
            position: 13
        },
        {
            number: 37,
            name: "Molar 2 Bawah Kanan",
            row: "lower",
            position: 14
        },
        {
            number: 38,
            name: "Molar 3 Bawah Kanan",
            row: "lower",
            position: 15
        },
    ];

    let selectedTeeth = [];
    let teethProblems = [];

    // Inisialisasi diagram gigi
    function initTeethDiagram() {
        renderTeethDiagram();
        renderTeethProblemsList();

        // Cek jika ada data yang sudah tersimpan (untuk edit mode)
        const savedData = document.getElementById('teethProblemsData').value;
        if (savedData) {
            try {
                teethProblems = JSON.parse(savedData);
                renderTeethProblemsList();
            } catch (e) {
                console.error('Error parsing saved teeth data:', e);
            }
        }
    }

    // Fungsi untuk merender diagram gigi
    function renderTeethDiagram() {
        const container = document.getElementById('teethChart');
        container.innerHTML = '';

        // Container untuk gigi atas
        const upperContainer = document.createElement('div');
        upperContainer.className = 'd-flex justify-content-center mb-4';
        upperContainer.innerHTML = '<div class="text-center mb-2 text-muted">ATAS</div><br>';

        // Container untuk gigi bawah
        const lowerContainer = document.createElement('div');
        lowerContainer.className = 'd-flex justify-content-center';
        lowerContainer.innerHTML = '<div class="text-center mb-2 text-muted">BAWAH</div><br>';

        // Membuat array untuk masing-masing baris
        const upperRow1 = [];
        const upperRow2 = [];
        const lowerRow1 = [];
        const lowerRow2 = [];

        // Membagi gigi berdasarkan posisi
        teethData.forEach(tooth => {
            if (tooth.row === 'upper') {
                if (tooth.position < 8) {
                    upperRow1.push(tooth);
                } else {
                    upperRow2.push(tooth);
                }
            } else {
                if (tooth.position < 8) {
                    lowerRow1.push(tooth);
                } else {
                    lowerRow2.push(tooth);
                }
            }
        });

        // Membuat elemen untuk setiap baris
        function createToothRow(teethArray, container) {
            const row = document.createElement('div');
            row.className = 'd-flex justify-content-center flex-wrap mb-2';

            teethArray.forEach(tooth => {
                const toothElement = document.createElement('div');
                toothElement.className = `tooth ${tooth.row}`;
                toothElement.dataset.number = tooth.number;
                toothElement.dataset.name = tooth.name;
                toothElement.innerHTML = `<span class="tooth-number">${tooth.number}</span>`;

                // Cek apakah gigi ini terpilih
                if (selectedTeeth.includes(tooth.number)) {
                    toothElement.classList.add('selected');
                }

                // Event click
                toothElement.addEventListener('click', function() {
                    toggleToothSelection(tooth.number);
                });

                row.appendChild(toothElement);
            });

            container.appendChild(row);
        }

        // Render gigi atas (dalam urutan yang benar)
        createToothRow(upperRow1.reverse(), upperContainer); // Kanan ke kiri
        createToothRow(upperRow2, upperContainer); // Kiri lanjutan

        // Render gigi bawah (dalam urutan yang benar)
        createToothRow(lowerRow1.reverse(), lowerContainer); // Kiri ke kanan
        createToothRow(lowerRow2, lowerContainer); // Kanan lanjutan

        container.appendChild(upperContainer);
        container.appendChild(lowerContainer);
        updateSelectedTeethDisplay();
    }

    // Toggle seleksi gigi
    function toggleToothSelection(toothNumber) {
        const index = selectedTeeth.indexOf(toothNumber);

        if (index === -1) {
            selectedTeeth.push(toothNumber);
        } else {
            selectedTeeth.splice(index, 1);
        }

        renderTeethDiagram();
    }

    // Update tampilan gigi terpilih
    function updateSelectedTeethDisplay() {
        const display = document.getElementById('selectedTeeth');
        display.innerHTML = '';

        if (selectedTeeth.length === 0) {
            display.innerHTML = '<span class="text-muted">Belum ada gigi dipilih</span>';
            return;
        }

        selectedTeeth.sort((a, b) => a - b).forEach(number => {
            const tooth = teethData.find(t => t.number === number);
            const badge = document.createElement('span');
            badge.className = 'badge bg-primary me-1 mb-1';
            badge.textContent = `Gigi ${number}`;
            badge.title = tooth ? tooth.name : '';
            display.appendChild(badge);
        });
    }

    // Tambah masalah gigi
    function addToothProblem() {
        if (selectedTeeth.length === 0) {
            showAlert('warning', 'Pilih gigi terlebih dahulu!');
            return;
        }

        const problemType = document.getElementById('problemType').value;
        const problemTypeText = document.getElementById('problemType').options[document.getElementById('problemType')
            .selectedIndex].text;

        let hasNewData = false;

        selectedTeeth.forEach(toothNumber => {
            // Cek apakah gigi dengan nomor dan tipe masalah yang sama sudah ada
            const isDuplicate = teethProblems.some(problem =>
                problem.toothNumber === toothNumber &&
                problem.problemType === problemType
            );

            if (isDuplicate) {
                return; // Lewati gigi ini
            }

            // Jika tidak duplikat, tambahkan data baru
            const tooth = teethData.find(t => t.number === toothNumber);
            const problem = {
                id: Date.now() + Math.random(),
                toothNumber: toothNumber,
                toothName: tooth ? tooth.name : `Gigi ${toothNumber}`,
                problemType: problemType,
                problemTypeText: problemTypeText,
                timestamp: new Date().getTime()
            };

            teethProblems.push(problem);
            hasNewData = true;
        });

        // Reset seleksi hanya jika ada data baru yang ditambahkan
        if (hasNewData) {
            selectedTeeth = [];
            renderTeethDiagram();
            renderTeethProblemsList();
            saveToHiddenInput();
            showAlert('success', 'Data gigi bermasalah berhasil ditambahkan!');
        } else {
            // Jika semua gigi duplikat, reset seleksi saja
            selectedTeeth = [];
            renderTeethDiagram();
            showAlert('info', 'Gigi yang dipilih sudah tercatat dengan masalah yang sama.');
        }
    }

    // Fungsi untuk menampilkan alert
    function showAlert(type, message) {
        // Hapus alert yang sudah ada
        const existingAlert = document.querySelector('.teeth-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show teeth-alert mt-3`;
        alertDiv.innerHTML = `
            <i class="bi ${type === 'success' ? 'bi-check-circle' : type === 'warning' ? 'bi-exclamation-triangle' : 'bi-info-circle'} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        const cardBody = document.querySelector('#teethProblemsList').parentElement;
        cardBody.insertBefore(alertDiv, document.querySelector('#teethProblemsList'));

        // Hapus otomatis setelah 3 detik
        setTimeout(() => {
            if (alertDiv.parentElement) {
                alertDiv.remove();
            }
        }, 3000);
    }

    // Render daftar masalah gigi
    function renderTeethProblemsList() {
        const container = document.getElementById('teethProblemsList');
        container.innerHTML = '';

        if (teethProblems.length === 0) {
            container.innerHTML =
                '<div class="text-center text-muted py-3">Belum ada gigi bermasalah yang ditambahkan</div>';
            return;
        }

        // Group by problem type
        const grouped = {};
        teethProblems.forEach(problem => {
            if (!grouped[problem.problemType]) {
                grouped[problem.problemType] = [];
            }
            grouped[problem.problemType].push(problem);
        });

        Object.keys(grouped).forEach(problemType => {
            const problems = grouped[problemType];
            const problemTypeText = problems[0].problemTypeText;
            const toothNumbers = problems.map(p => p.toothNumber).sort((a, b) => a - b);

            const item = document.createElement('div');
            item.className = 'problem-item';
            item.innerHTML = `
                <div>
                    <strong>${problemTypeText}</strong>
                    <div class="mt-1">
                        ${toothNumbers.map(num => `<span class="badge bg-info me-1">${num}</span>`).join('')}
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-sm btn-outline-danger remove-btn" onclick="removeToothProblems('${problemType}')">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `;

            container.appendChild(item);
        });
    }

    // Hapus masalah gigi berdasarkan tipe
    function removeToothProblems(problemType) {
        if (confirm('Apakah Anda yakin ingin menghapus masalah gigi ini?')) {
            teethProblems = teethProblems.filter(p => p.problemType !== problemType);
            renderTeethProblemsList();
            saveToHiddenInput();
            showAlert('success', 'Masalah gigi berhasil dihapus!');
        }
    }

    // Hapus semua pilihan
    function clearSelectedTeeth() {
        selectedTeeth = [];
        renderTeethDiagram();
    }

    // Simpan ke input tersembunyi
    function saveToHiddenInput() {
        const input = document.getElementById('teethProblemsData');
        input.value = JSON.stringify(teethProblems);
    }

    // Fungsi untuk toggle detail berdasarkan checkbox
    function toggleDetails(checkbox) {
        const targetId = checkbox.getAttribute('data-target');
        const targetElement = document.getElementById(targetId);

        if (checkbox.checked) {
            targetElement.style.display = 'block';
        } else {
            targetElement.style.display = 'none';
            // Clear input fields ketika checkbox tidak dicentang
            const inputs = targetElement.querySelectorAll('input');
            inputs.forEach(input => input.value = '');
        }
    }

    // Event listener untuk semua checkbox dengan data-target
    document.addEventListener('DOMContentLoaded', function() {
        // Bahaya lingkungan kerja
        document.querySelectorAll('.bahaya-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleDetails(this);
            });
            // Set initial state
            if (checkbox.checked) {
                toggleDetails(checkbox);
            }
        });

        // Kecelakaan kerja
        document.querySelectorAll('.kecelakaan-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleDetails(this);
            });
            if (checkbox.checked) {
                toggleDetails(checkbox);
            }
        });

        // Kebiasaan
        document.querySelectorAll('.kebiasaan-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleDetails(this);
            });
            if (checkbox.checked) {
                toggleDetails(checkbox);
            }
        });

        // Penyakit
        document.querySelectorAll('.penyakit-checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                toggleDetails(this);
            });
            if (checkbox.checked) {
                toggleDetails(checkbox);
            }
        });

        // Buta warna
        const butaWarnaCheck = document.querySelector('input[name="buta_warna_check"]');
        if (butaWarnaCheck) {
            butaWarnaCheck.addEventListener('change', function() {
                toggleDetails(this);
            });
            if (butaWarnaCheck.checked) {
                toggleDetails(butaWarnaCheck);
            }
        }

        // Visus dan lainnya
        document.querySelectorAll('input[data-target]').forEach(function(checkbox) {
            if (!checkbox.classList.contains('bahaya-checkbox') &&
                !checkbox.classList.contains('kecelakaan-checkbox') &&
                !checkbox.classList.contains('kebiasaan-checkbox') &&
                !checkbox.classList.contains('penyakit-checkbox')) {
                checkbox.addEventListener('change', function() {
                    toggleDetails(this);
                });
                if (checkbox.checked) {
                    toggleDetails(checkbox);
                }
            }
        });
    });
</script>
