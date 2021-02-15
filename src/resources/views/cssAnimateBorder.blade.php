<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .bb, .bb::before, .bb::after {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .bb {
            width: 80%;
            height: 80%;
            margin: auto;
            color: #69ca62;
            box-shadow: inset 0 0 0 1px rgba(105, 202, 98, 0.5);
        }

        .bb::before, .bb::after {
            content: '';
            z-index: -1;
            margin: -10px;
            box-shadow: inset 0 0 0 2px;
            animation: clipMe 8s linear infinite;
        }

        .bb::before {
            animation-delay: -4s;
        }

        @keyframes clipMe {
            0%, 100% {
                clip: rect(0px, 220px, 2px, 0px);
            }
            25% {
                clip: rect(0px, 2px, 220px, 0px);
            }
            50% {
                clip: rect(218px, 220px, 220px, 0px);
            }
            75% {
                clip: rect(0px, 220px, 220px, 218px);
            }
        }


        body {
            background-color: #0f222b;
        }

    </style>
</head>

<body translate="no">
    <div class="bb"></div>
</body>
</html>

