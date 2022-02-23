$mines = 10; // количество мин на поле
$fx    = 9;  // ширина поля (в клетках)
$fy    = 9;  // высота поля (в клетках)

####
// заполнение начального поля нулями
for ($y = 1; $y <= $fy; $y++) {
for ($x = 1; $x <= $fx; $x++) {
$minefield[$x][$y] = '0';
}
}
// заполнение поля минами
for ($i = 0; $i < $mines; $i++) {
$randx = rand(1, $fx);  // генерируем случайные координаты
$randy = rand(1, $fy);  //

if ($minefield[$randx][$randy] == 'X') { // координаты совпали и мина уже есть
$i--; // тогда не ставим мину, а скажем попробовать лишний раз
} else {
$minefield[$randx][$randy] = 'X'; // ставим мину
}
}

echo <<<HEAD
<DOCTYPE !html>
    <html>
    <head>
        <title>Minesweeper ($fx x $fy) by bafoed</title>
        <style type="text/css">
            table,tr {
                background: #C4C4C4;
                border: 1px solid #808080;
                border-collapse: collapse;
                font-weight: bold;
                font-size: 14px;
                text-align: center;
            }

            td {
                border: 1px solid #808080;
                padding: 0.5px;
                width:16px;
                height:16px;
            }

            .i1 {
                color: #0000ff;
            }

            .i2 {
                color: #1D751F;
            }

            .i3 {
                color: #ff0000;
            }

            .i4 {
                color: #0D0485;
            }

            .i5 {
                color: #520E0F;
            }

            .i6 {
                color: #0F877E;
            }
        </style>
    </head>

    <body>
    HEAD;

    echo '<pre><tt>
<table>
';
for ($y = 1; $y <= $fy; $y++) {
    echo '<tr>
    ';
    for ($x = 1; $x <= $fx; $x++) {
        echo '<td>';
        $mCounter = 0; // счетчик мин для клетки

        if ($minefield[$x][$y] == 'X') { // если текущая клетка -- мина
            echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAIAAACQkWg2AAAACXBIWXMAAA7EAAAOxAGVKw4bAAABUElEQVR42pWSS26CUBRAH6ho0jqijBpHdkhIjCtgDXbGzI7ZBVOURPegMagYmZAwFZdh0iWwgfb0vYZQYNKbYO7n3J/vivP5nCTJ4XA4Ho+JFJSVlLoHAAVYXC4X7DzP0zRF2e12RVG8SkHBxEkIQOULUjF8399ut1mW3W63IAiepKBg4iQEABbHseC7Xq+bzcZ13fV6PZ/Px+OxrutCiNFoNJvNcBICADudTkKNSJkoikBFS3ASAvgdiY9Bae04DuHp29TzvMX7QjXp9/v82rYNAPaTQN79fmdcy7KILT+WX1IMw1Ader2eaZoAYMAiDMPJZKIqIdQuy/Lx+RgMBvXBAMD2+/2fBE3TmGQ4HFblOxKqkehL9/bSzZGqpdms2rJeuLn0v//WxsPxUryXQrsfrvM0nqV0n0b7+FjuRQpKx/Gp88agXf2Y6wdPSOnA3/AoQ71G5naTAAAAAElFTkSuQmCC" /></td>
        '; // выведем и перейдем на следущую клетку
            continue;
        }
        // тут магия, ищем мины вокруг клетки
		// распишу в статье
        if ($minefield[$x - 1][$y - 1] === 'X')
            $mCounter++;
        if ($minefield[$x][$y - 1] === 'X')
            $mCounter++;
        if ($minefield[$x + 1][$y - 1] === 'X')
            $mCounter++;

        if ($minefield[$x - 1][$y] === 'X')
            $mCounter++;
        if ($minefield[$x + 1][$y] === 'X')
            $mCounter++;

        if ($minefield[$x - 1][$y + 1] === 'X')
            $mCounter++;
        if ($minefield[$x][$y + 1] === 'X')
            $mCounter++;
        if ($minefield[$x + 1][$y + 1] === 'X')
            $mCounter++;

		// если нет мин вокруг глетки -- выводим пустую, а не с цифрой 0
        $minefield[$x][$y] = ($mCounter == 0) ? '&nbsp;&nbsp;' : $mCounter;

		// выводим клетку с классом
        echo '<span class="i' . $mCounter . '">' . $minefield[$x][$y] . '</span></td>
        ';
    }
    echo '</tr>
    ';
}
echo '</table></tt></pre >
    </body>
    </html>';
