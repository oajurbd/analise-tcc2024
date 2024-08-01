const value = document.getElementById('value');
        const botaomais = document.getElementById('mais');
        const botaomenos = document.getElementById('menos');

        const updateValue = () => {
            value.innerHTML = count;
        };

        let count = 0;
        let intervalId = 0;

        botaomais.addEventListener('mousedown', () => {
            intervalId = setInterval(() => {
                count += 1;
                updateValue();
            }, 100);
        });

        botaomenos.addEventListener('mousedown', () => {
            intervalId = setInterval(() => {
                count -= 1;
                updateValue();
            }, 100);
        });

        document.addEventListener('mouseup', () => clearInterval(intervalId));
