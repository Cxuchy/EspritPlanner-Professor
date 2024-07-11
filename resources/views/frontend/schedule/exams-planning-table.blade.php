{{-- --}}
<div class="card-body px-0 pb-2">
    <div class="table-responsive p-0">

        <table class="table align-items-center mb-0">
            <thead>
                <tr>

                    @foreach ($data as $passageexam)
                        @php
                            // Current date and time
                            $currentDateTime = new DateTime();

                            // Passage date and time
                            $passageDateTime = new DateTime($passageexam->datepassage);

                            // Check if the passage date has already passed
                            $hasPassed = $currentDateTime > $passageDateTime;

                            // Calculate the remaining required professors
                            $remainingProfessors = $passageexam->nbprof_required - $passageexam->nbprof_enrolled;
                        @endphp


                        @if (!$hasPassed && $remainingProfessors > 0)
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                @php
                                    // Convert the datepassage to the desired format
                                    $date = new DateTime($passageexam->datepassage);
                                    $formattedDate =
                                        'The ' .
                                        $date->format('jS') .
                                        ' of ' .
                                        $date->format('F') .
                                        ' ' .
                                        $date->format('Y');
                                @endphp
                                <strong>{{ $formattedDate }} at {{ $passageexam->heurepassage }}:00</strong>
                            </th>
                        @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <form id="examForm" action="{{ route('submit-schedule') }}" method="POST">
                    @csrf

                    <tr>
                        @foreach ($data as $passageexam)

                            @php
                                // Current date and time
                                $currentDateTime = new DateTime();

                                // Passage date and time
                                $passageDateTime = new DateTime($passageexam->datepassage);

                                // Check if the passage date has already passed
                                $hasPassed = $currentDateTime > $passageDateTime;

                                // Calculate the remaining required professors
                                $remainingProfessors = $passageexam->nbprof_required - $passageexam->nbprof_enrolled;
                            @endphp

                            @if (!$hasPassed && $remainingProfessors > 0)
                                <td class="align-middle text-center">
                                    <div class="checkbox-container">
                                        <div class="checkbox-item">
                                            <input type="checkbox" class="list1" name="selected_exams_list1[]"
                                                value="{{ $passageexam->id }}"
                                                {{ $remainingProfessors == 0 ? 'disabled' : '' }}>
                                            <label for="list1"></label>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="checkbox" class="list2" name="selected_exams_list2[]"
                                                value="{{ $passageexam->id }}"
                                                {{ $remainingProfessors == 0 ? 'disabled' : '' }}>
                                            <label for="list2"></label>
                                        </div>
                                    </div>
                                    <p class="remaining-supervisors">
                                        <small>{{ $remainingProfessors }} supervisors remaining</small>
                                    </p>
                                </td>
                            @endif
                        @endforeach
                    </tr>
            </tbody>
        </table>

    </div>

    @if ($hasplanning == 0)
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-6 text-end">
                    <button id="submitBtn" class="btn bg-gradient-dark mb-0" type="submit"><i
                            class="material-icons text-sm">add</i>&nbsp;&nbsp;Submit Choices</button>
                </div>
            </div>
        </div>
    @else
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0"></h6>
                </div>
                <div class="col-6 text-end">
                    <a class="btn bg-gradient-dark mb-0"><i class="material-icons text-sm">close</i>&nbsp;&nbsp;You
                        cannot submit a request ,
                        you already have one </a>
                </div>
            </div>
        </div>
    @endif


    </form>


    <!-- Js code for disabling the second checkbox when the first is selected and vice versa -->
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('input.list1').forEach(checkbox1 => {
                checkbox1.addEventListener('change', () => {
                    const correspondingCheckbox2 = checkbox1.closest('.checkbox-item')
                        .nextElementSibling.querySelector('input.list2');
                    if (checkbox1.checked) {
                        correspondingCheckbox2.disabled = true;
                    } else {
                        correspondingCheckbox2.disabled = false;
                    }
                });
            });

            document.querySelectorAll('input.list2').forEach(checkbox2 => {
                checkbox2.addEventListener('change', () => {
                    const correspondingCheckbox1 = checkbox2.closest('.checkbox-item')
                        .previousElementSibling.querySelector('input.list1');
                    if (checkbox2.checked) {
                        correspondingCheckbox1.disabled = true;
                    } else {
                        correspondingCheckbox1.disabled = false;
                    }
                });
            });
        });
    </script>

    <!-- Page alert to select 10 choices for each type --->
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            var list1 = document.querySelectorAll('input.list1:checked').length;
            var list2 = document.querySelectorAll('input.list2:checked').length;

            if (list1 !== 10 || list2 !== 10) {
                alert('Please select exactly 10 choices for both lists.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>





    <!-- Real time counter for checkboxes -->
    <script>
        function updateCheckedCount() {
            var checkboxesList1 = document.querySelectorAll('input.list1[type="checkbox"]');
            var checkboxesList2 = document.querySelectorAll('input.list2[type="checkbox"]');

            var checkedCountList1 = 0;
            checkboxesList1.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCountList1++;
                }
            });

            var checkedCountList2 = 0;
            checkboxesList2.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCountList2++;

                }

            });

            document.getElementById('checkedCountList1').innerText = 'Primary: ' + checkedCountList1 + '/10';
            document.getElementById('checkedCountList2').innerText = 'Secondary: ' + checkedCountList2 + '/10';
        }

        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', updateCheckedCount);
        });

        // Call the function initially to update the count on page load
        updateCheckedCount();
    </script>



    <style>
        .checkbox-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            /* Adjust the gap as needed */
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
            /* Adjust the gap between checkbox and label as needed */
        }

        .checkbox-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
        }

        .remaining-supervisors {
            margin-top: 10px;
            /* Adjust the margin as needed */
        }
    </style>
