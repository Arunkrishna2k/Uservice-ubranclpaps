<div class="max-w-4">
    <div class="max-w-4 mx-auto sm:px-4 lg:px-6 grid grid-cols-2 gap-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="relative overflow-hidden shadow-lg cursor-pointer text-center" id="printableArea">
                <img class="object-cover w-full h-full" src="./../images/OrgComm.jpg" alt="Flower and sky" />

                <div class="absolute top-20 left-0 px-6 py-2 text-left justify-center"
                    style="margin-top: 26%; margin-left:20%;align-conent:center; align-item:center">

                    <h4 class="text-xl font-semibold tracking-tight text-black">
                        <strong>{{ $params->customer_name }}</strong>
                    </h4>
                    <p class="leading-normal text-black font-semibold	">{{ $params->email }}</p>
{{--                    <p class="leading-normal text-black font-semibold	">Mobile: {{ $params->phone_number }}</p>--}}
                    <p class="leading-normal text-black font-semibold	">{{ $params->register_type }}</p>
                    <p class="leading-normal text-black font-semibold	">{{ $params->mci_number }}</p>
                    <p class="leading-normal text-black font-semibold	">{{ $params->register_number }}</p>
{{--                    <br>--}}
                    <br>
                    <br>
                    <br>
                    <div style="align-content: center;align-items: center;margin-left: 18%;">
                        {{ QrCode::generate($params->register_number) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex items-center justify-center px-4 py-3 text-center sm:px-6">
    <button onclick="printDiv('printableArea')"
        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        Download
    </button>
</div>
<script>
    function printDiv(divName) {
        // var printContents = document.getElementById(divName).innerHTML;
        // document.getElementById(divName).style.height = 200;
        // document.getElementById(divName).style.width = 300;
        // var originalContents = document.body.innerHTML;

        // document.body.innerHTML = printContents;

        // window.print();
        const url = window.location.href;
        const strs = url.split('/');
        const id = strs.at(-1)
        console.log(id)
        // document.body.innerHTML = originalContents;
        html2canvas(document.getElementById("printableArea"), {
                    allowTaint: true,
                    useCORS: true
                }).then(function(canvas) {
                    var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    anchorTag.style.height = "200px";
                    anchorTag.style.width = "100px";
            anchorTag.download = "image"+id+".jpg";
                    anchorTag.href = canvas.toDataURL();
                    anchorTag.target = '_blank';
                    anchorTag.click();
      });
    }
    const url = window.location.href;
    const strs = url.split('/');
    const id = strs.at(-1)
    console.log(id)
    html2canvas(document.getElementById("printableArea"), {
                    allowTaint: true,
                    useCORS: true
                }).then(function(canvas) {
                    var anchorTag = document.createElement("a");
                    document.body.appendChild(anchorTag);
                    anchorTag.style.height = "200px";
                    anchorTag.style.width = "100px";
                    anchorTag.download = "image"+id+".jpg";
                    anchorTag.href = canvas.toDataURL();
                    anchorTag.target = '_blank';
                    anchorTag.click();
      });
</script>
