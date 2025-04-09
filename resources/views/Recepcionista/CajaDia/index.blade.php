@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<style>
    :root {
        --primary: #2A2F35;
        --accent: #00C9A7;
        --background: #F4F6F9;
        --glass: rgba(255, 255, 255, 0.95);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        color: var(--primary);
        background: var(--background);
        font-size: 14px;
        padding-top: 60px;
    }

    .container {
        display: grid;
        grid-template-columns: 1fr 350px;
        width: 95%;
        max-width: 1200px;
        margin: 20px auto;
        background: var(--glass);
        backdrop-filter: blur(20px);
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        overflow: hidden;
        min-height: calc(100vh - 100px);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 15px;
        padding: 20px;
        background: rgba(248, 249, 250, 0.7);
        backdrop-filter: blur(10px);
        overflow-y: auto;
        max-height: calc(100vh - 180px);
    }

    .product-card {
        background: white;
        border-radius: 15px;
        padding: 15px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        width: 100%;
        height: 110px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .product-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,201,167,0.2);
    }

    .product-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--accent);
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .product-card:hover::after {
        transform: scaleX(1);
    }

    .product-card h3 {
        color: var(--primary);
        margin-bottom: 8px;
        font-size: 1em;
        font-weight: 600;
        text-align: center;
    }

    .product-card p {
        color: #6C757D;
        font-weight: 600;
        font-size: 1.1em;
        text-align: center;
    }

    .transaction-panel {
        background: var(--primary);
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        border-left: 2px solid rgba(255,255,255,0.1);
        width: 350px;
        position: sticky;
        top: 0;
        height: calc(100vh - 100px);
    }

    .transaction-header {
        text-align: center;
        margin-bottom: 15px;
        position: relative;
    }

    .transaction-header h2 {
        font-size: 1.3em;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: 700;
        padding: 10px 0;
    }

    .transaction-list {
        flex: 1;
        overflow-y: auto;
        margin-bottom: 15px;
        background: rgba(0,0,0,0.2);
        border-radius: 15px;
        padding: 10px;
        max-height: calc(100% - 200px);
    }

    .transaction-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        margin-bottom: 10px;
        background: rgba(255,255,255,0.05);
        border-radius: 10px;
        animation: slideIn 0.3s ease;
        word-break: break-word;
    }

    .transaction-item > div:first-child {
        flex: 1;
        min-width: 0;
    }

    @keyframes slideIn {
        from { transform: translateX(20px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0 10px;
        flex-shrink: 0;
    }

    .quantity-btn {
        width: 20px;
        height: 20px;
        border: none;
        border-radius: 6px;
        background: var(--accent);
        color: white;
        cursor: pointer;
        transition: all 0.3s;
    }

    .quantity-btn:hover {
        opacity: 0.8;
    }

    .manual-input input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid var(--accent);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 1em;
        text-align: center;
        margin-bottom: 10px;
    }

    .total-display {
        font-size: 1.3em;
        font-weight: 700;
        margin: 15px 0;
        text-align: center;
        padding: 15px;
        background: rgba(0,0,0,0.2);
        border-radius: 15px;
        flex-shrink: 0;
    }

    .payment-buttons {
        display: grid;
        gap: 12px;
        margin-top: auto;
        flex-shrink: 0;
    }

    .btn {
        padding: 12px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        font-weight: 600;
        transition: all 0.3s;
        font-size: 0.95em;
    }

    .btn-pay {
        background: linear-gradient(135deg, var(--accent) 0%, #00B89A 100%);
        color: white;
    }

    .btn-clear {
        background: linear-gradient(135deg, #EA5455 0%, #D84345 100%);
        color: white;
    }

    .btn-report {
        background: linear-gradient(135deg, #6C757D 0%, #5A6268 100%);
        color: white;
    }

    .btn:hover {
        box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        transform: translateY(-2px);
    }

    .payment-modal,
    .summary-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        backdrop-filter: blur(10px);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .payment-content,
    .summary-content {
        background: var(--primary);
        color: white;
        width: 90%;
        max-width: 700px;
        max-height: 80vh;
        padding: 25px;
        border-radius: 15px;
        position: relative;
        animation: modalFadeIn 0.5s ease;
        overflow-y: auto;
    }

    @keyframes modalFadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .close-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        font-size: 1.5em;
        color: rgba(255,255,255,0.7);
        transition: all 0.3s;
    }

    .close-btn:hover {
        color: white;
    }

    .payment-methods {
        display: grid;
        gap: 15px;
        margin: 20px 0;
    }

    .method-btn {
        padding: 15px;
        border: 2px solid rgba(255,255,255,0.1);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
        background: none;
        color: white;
        font-size: 1em;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .method-btn:hover {
        background: rgba(255,255,255,0.1);
    }

    .cash-input {
        margin-top: 20px;
        display: none;
    }

    .cash-input input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid var(--accent);
        background: rgba(255,255,255,0.1);
        color: white;
        font-size: 1em;
        text-align: center;
    }

    .change-display {
        margin-top: 15px;
        font-size: 1em;
        display: none;
        text-align: center;
        color: var(--accent);
    }

    .client-info {
        margin: 15px 0;
    }

    .client-info input {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid var(--accent);
        background: rgba(255,255,255,0.1);
        color: white;
        font-size: 1em;
        text-align: center;
    }

    .summary-table {
        width: 100%;
        border-collapse: collapse;
        margin: 15px 0;
    }

    .summary-table th, .summary-table td {
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px;
        text-align: center;
    }

    .summary-table th {
        background-color: rgba(255, 255, 255, 0.05);
        font-weight: 600;
    }

    .summary-table tr:hover {
        background-color: rgba(255, 255, 255, 0.03);
    }

    .print-button {
        margin-top: 15px;
        text-align: center;
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn-print {
        padding: 10px 15px;
        border: none;
        border-radius: 8px;
        background: var(--accent);
        color: white;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-print:hover {
        background: #00B89A;
    }

    @media (max-width: 1024px) {
        .container {
            grid-template-columns: 1fr;
        }
        
        .transaction-panel {
            width: 100%;
            height: auto;
            position: relative;
            border-left: none;
            border-top: 2px solid rgba(255,255,255,0.1);
        }
        
        .products-grid {
            max-height: 50vh;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-print, .invoice-print * {
            visibility: visible;
        }
        .invoice-print {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            font-size: 12px;
        }
        .invoice-print table {
            width: 100%;
        }
    }
</style>

<body>
    <div class="container">
        <!-- Panel de Productos -->
        <div class="products-grid">
            <div class="product-card" data-price="50000" onclick="addToCart('Plan Básico', 50000)">
                <h3><i class="fas fa-dumbbell"></i> Plan Básico</h3>
                <p>$50,000</p>
            </div>
            <div class="product-card" data-price="5000" onclick="addToCart('Día Pasante', 5000)">
                <h3><i class="fas fa-calendar-day"></i> Diario</h3>
                <p>$5,000</p>
            </div>
            <div class="product-card" data-price="80000" onclick="addToCart('Plan Medio', 80000)">
                <h3><i class="fas fa-user-tie"></i> Plan Medio</h3>
                <p>$80,000</p>
            </div>
            <div class="product-card" data-price="20000" onclick="addToCart('Proteína', 20000)">
                <h3><i class="fas fa-capsules"></i> Proteína</h3>
                <p>$20,000</p>
            </div>
            <div class="product-card" data-price="30000" onclick="addToCart('Clase Grupal', 30000)">
                <h3><i class="fas fa-users"></i> Grupal</h3>
                <p>$30,000</p>
            </div>
            <div class="product-card" data-price="100000" onclick="addToCart('Plan VIP', 100000)">
                <h3><i class="fas fa-calendar-alt"></i> VIP</h3>
                <p>$100,000</p>
            </div>
            <div class="product-card" data-price="110000" onclick="addToCart('Plan Anual', 110000)">
                <h3><i class="fas fa-dumbbell"></i> Plan Anual</h3>
                <p>$110,000</p>
            </div>
            <div class="product-card" data-price="50000" onclick="addToCart('Plan Básico', 50000)">
                <h3><i class="fas fa-dumbbell"></i> Plan Básico</h3>
                <p>$50,000</p>
            </div>
        </div>

        <!-- Panel de Transacción -->
        <div class="transaction-panel">
            <div class="transaction-header">
                <h2><i class="fas fa-receipt"></i> Transacción Actual</h2>
            </div>
            
            <div class="transaction-list" id="transactionList"></div>

            <!-- Campo de entrada manual -->
            <div class="manual-input">
                <input type="number" id="manualAmount" placeholder="Ingrese monto manual" oninput="updateTotalWithManualAmount()">
            </div>

            <div class="total-display">
                TOTAL: $<span id="currentTotal">0</span>
            </div>

            <div class="payment-buttons">
                <button class="btn btn-pay" onclick="processPayment()">
                    <i class="fas fa-credit-card"></i> Procesar Pago
                </button>
                <button class="btn btn-clear" onclick="clearTransaction()">
                    <i class="fas fa-trash-alt"></i> Cancelar
                </button>
                <button class="btn btn-report" onclick="showDailySummary()">
                    <i class="fas fa-file-invoice-dollar"></i> Cierre Diario
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de Pago -->
    <div class="payment-modal" id="paymentModal">
        <div class="payment-content">
            <i class="fas fa-times close-btn" onclick="closePaymentModal()"></i>
            <h2><i class="fas fa-cash-register"></i> Método de Pago</h2>
            
            <div class="client-info">
                <input type="number" id="clientId" placeholder="Número de Cédula del Cliente" required>
            </div>

            <div class="payment-methods">
                <button class="method-btn" onclick="selectPaymentMethod('cash')">
                    <i class="fas fa-money-bill-wave"></i> Efectivo
                </button>
                <button class="method-btn" onclick="selectPaymentMethod('card')">
                    <i class="fas fa-credit-card"></i> Tarjeta
                </button>
                <button class="method-btn" onclick="selectPaymentMethod('transfer')">
                    <i class="fas fa-mobile-alt"></i> Transferencia
                </button>
            </div>

            <div class="cash-input" id="cashInput">
                <input type="number" id="cashReceived" placeholder="Monto recibido">
                <div class="change-display" id="changeDisplay">
                    Cambio: $<span id="changeAmount">0.00</span>
                </div>
            </div>

            <button class="btn btn-pay" onclick="confirmPayment()" style="width: 100%; margin-top: 20px;">
                <i class="fas fa-check-circle"></i> Confirmar Pago
            </button>
        </div>
    </div>

    <!-- Modal de Resumen -->
    <div class="summary-modal" id="summaryModal">
        <div class="summary-content">
            <i class="fas fa-times close-btn" onclick="closeSummary()"></i>
            <h2><i class="fas fa-chart-pie"></i> Resumen Diario</h2>
            <div id="dailySummary" style="margin: 25px 0;">
                <!-- Contenido generado dinámicamente -->
            </div>
        </div>
    </div>

    <script>
        let currentTransaction = [];
        let selectedMethod = null;
        let totalAmount = 0;
        let manualAmount = 0;
    
        function addToCart(name, price) {
            const existingItem = currentTransaction.find(item => item.name === name);
            
            if(existingItem) {
                existingItem.quantity++;
            } else {
                currentTransaction.push({
                    name: name,
                    price: price,
                    quantity: 1
                });
            }
            
            updateTransactionDisplay();
            showNotification(`✔️ ${name} agregado`);
        }
    
        function updateTotalWithManualAmount() {
            manualAmount = parseFloat(document.getElementById('manualAmount').value) || 0;
            updateTransactionDisplay();
        }
    
        function updateTransactionDisplay() {
            const list = document.getElementById('transactionList');
            const total = currentTransaction.reduce((sum, item) => sum + (item.price * item.quantity), 0) + manualAmount;
            totalAmount = total;
            
            list.innerHTML = currentTransaction.map(item => `
                <div class="transaction-item">
                    <div>
                        <div style="font-weight: 500;">${item.name}</div>
                        <div style="font-size: 0.9em; color: #8D99AE;">$${item.price.toLocaleString('es-CO')} c/u</div>
                    </div>
                    <div class="quantity-control">
                        <button class="quantity-btn" onclick="adjustQuantity('${item.name}', -1)">-</button>
                        <span>${item.quantity}</span>
                        <button class="quantity-btn" onclick="adjustQuantity('${item.name}', 1)">+</button>
                    </div>
                    <div style="font-weight: 600; color: var(--accent);">
                        $${(item.price * item.quantity).toLocaleString('es-CO')}
                    </div>
                </div>
            `).join('');
            
            if (manualAmount > 0) {
                list.innerHTML += `
                    <div class="transaction-item">
                        <div>
                            <div style="font-weight: 500;">Monto Manual</div>
                        </div>
                        <div style="font-weight: 600; color: var(--accent);">
                            $${manualAmount.toLocaleString('es-CO')}
                        </div>
                    </div>
                `;
            }
            
            document.getElementById('currentTotal').textContent = total.toLocaleString('es-CO');
        }
    
        function adjustQuantity(name, amount) {
            const item = currentTransaction.find(item => item.name === name);
            if(item) {
                item.quantity += amount;
                if(item.quantity < 1) {
                    currentTransaction = currentTransaction.filter(i => i !== item);
                }
                updateTransactionDisplay();
            }
        }
    
        function processPayment() {
            if(currentTransaction.length === 0 && manualAmount === 0) {
                showNotification('⚠️ No hay productos en la transacción');
                return;
            }
            document.getElementById('paymentModal').style.display = 'flex';
        }
    
        function selectPaymentMethod(method) {
            selectedMethod = method;
            document.querySelectorAll('.method-btn').forEach(btn => {
                btn.style.background = 'none';
            });
            event.target.style.background = 'rgba(255,255,255,0.1)';
            
            if(method === 'cash') {
                document.getElementById('cashInput').style.display = 'block';
                document.getElementById('cashReceived').addEventListener('input', calculateChange);
            } else {
                document.getElementById('cashInput').style.display = 'none';
            }
        }
    
        function calculateChange() {
            const received = parseFloat(document.getElementById('cashReceived').value);
            if(received >= totalAmount) {
                const change = received - totalAmount;
                document.getElementById('changeDisplay').style.display = 'block';
                document.getElementById('changeAmount').textContent = change.toFixed(2);
            } else {
                document.getElementById('changeDisplay').style.display = 'none';
            }
        }
    
        function confirmPayment() {
            const clientId = document.getElementById('clientId').value;
            if(!clientId) {
                showNotification('⚠️ Ingrese el número de cédula');
                return;
            }
    
            if(!selectedMethod) {
                showNotification('⚠️ Seleccione un método de pago');
                return;
            }
    
            if(selectedMethod === 'cash') {
                const received = parseFloat(document.getElementById('cashReceived').value);
                if(!received || received < totalAmount) {
                    showNotification('⚠️ Monto insuficiente');
                    return;
                }
            }
    
            const transaction = saveTransaction(selectedMethod, clientId);
            printInvoice(transaction);
            
            currentTransaction = [];
            manualAmount = 0;
            document.getElementById('manualAmount').value = '';
            updateTransactionDisplay();
            closePaymentModal();
            showNotification('✅ Pago procesado correctamente');
        }
    
        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = 'none';
            selectedMethod = null;
            document.getElementById('cashReceived').value = '';
            document.getElementById('clientId').value = '';
            document.getElementById('changeDisplay').style.display = 'none';
        }
    
        function saveTransaction(method, clientId) {
            const now = new Date();
            const offset = now.getTimezoneOffset() * 60000;
            const localISOTime = new Date(now - offset).toISOString();
    
            const transaction = {
                date: localISOTime,
                clientId: clientId,
                items: [...currentTransaction],
                manualAmount: manualAmount,
                total: totalAmount,
                method: method,
                details: {},
                invoiceNumber: 'FAC-' + Date.now().toString().slice(-6)
            };
    
            if(method === 'cash') {
                const received = parseFloat(document.getElementById('cashReceived').value);
                transaction.details = {
                    received: received,
                    change: received - totalAmount
                };
            }
    
            const history = JSON.parse(localStorage.getItem('gymPosHistory') || '[]');
            history.push(transaction);
            localStorage.setItem('gymPosHistory', JSON.stringify(history));
            
            return transaction;
        }
    
        function printInvoice(transaction) {
            const invoiceWindow = window.open('', 'Factura', 'width=800,height=600');
            
            invoiceWindow.document.write(`
                <html>
                <head>
                    <title>Factura ${transaction.invoiceNumber}</title>
                    <style>
                        .invoice-print {
                            font-family: Arial, sans-serif;
                            width: 100%;
                            max-width: 800px;
                            margin: 0 auto;
                            padding: 20px;
                        }
                        .header {
                            text-align: center;
                            border-bottom: 2px solid #000;
                            margin-bottom: 20px;
                        }
                        .details {
                            margin: 20px 0;
                            display: grid;
                            grid-template-columns: 1fr 1fr;
                            gap: 20px;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                        .total {
                            font-size: 1.2em;
                            font-weight: bold;
                            text-align: right;
                        }
                        @media print {
                            body { margin: 0; }
                            .invoice-print { padding: 10px; }
                        }
                    </style>
                </head>
                <body>
                    <div class="invoice-print">
                        <div class="header">
                            <h1>Gimnasio Muscle Gym Sport</h1>
                            <p>NIT: 123456789-0</p>
                            <p>Dirección: Calle 123 #45-67</p>
                            <p>Teléfono: (601) 123 4567</p>
                        </div>
                        
                        <div class="details">
                            <div>
                                <p><strong>N° Factura:</strong> ${transaction.invoiceNumber}</p>
                                <p><strong>Fecha:</strong> ${new Date(transaction.date).toLocaleString('es-CO')}</p>
                            </div>
                            <div>
                                <p><strong>Cliente:</strong></p>
                                <p><strong>Cédula:</strong> ${transaction.clientId}</p>
                            </div>
                        </div>
    
                        <table>
                            <thead>
                                <tr>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${transaction.items.map(item => `
                                    <tr>
                                        <td>${item.name}</td>
                                        <td>${item.quantity}</td>
                                        <td>$${item.price.toLocaleString('es-CO')}</td>
                                        <td>$${(item.price * item.quantity).toLocaleString('es-CO')}</td>
                                    </tr>
                                `).join('')}
                                ${transaction.manualAmount > 0 ? `
                                    <tr>
                                        <td>Monto Manual</td>
                                        <td>1</td>
                                        <td>-</td>
                                        <td>$${transaction.manualAmount.toLocaleString('es-CO')}</td>
                                    </tr>
                                ` : ''}
                            </tbody>
                        </table>
    
                        <div class="total">
                            <p>Total: $${transaction.total.toLocaleString('es-CO')}</p>
                            <p>Método de Pago: ${transaction.method.toUpperCase()}</p>
                            ${transaction.method === 'cash' ? `
                                <p>Efectivo Recibido: $${transaction.details.received.toLocaleString('es-CO')}</p>
                                <p>Cambio: $${transaction.details.change.toLocaleString('es-CO')}</p>
                            ` : ''}
                        </div>
    
                        <div style="margin-top: 50px; text-align: center;">
                            <p>¡Gracias por su compra!</p>
                            <p>Este documento es una factura electrónica válida</p>
                        </div>
                    </div>
                </body>
                </html>
            `);
    
            invoiceWindow.document.close();
            invoiceWindow.print();
        }
    
        function showDailySummary() {
            try {
                const history = JSON.parse(localStorage.getItem('gymPosHistory') || '[]');
                
                // Obtener fecha actual en la zona horaria correcta
                const today = new Date();
                const startOfDay = new Date(today.getFullYear(), today.getMonth(), today.getDate());
                const endOfDay = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 23, 59, 59, 999);
    
                const todayTransactions = history.filter(t => {
                    try {
                        const transactionDate = new Date(t.date);
                        return transactionDate >= startOfDay && transactionDate <= endOfDay;
                    } catch (e) {
                        console.error("Error procesando fecha:", e);
                        return false;
                    }
                });
    
                if (todayTransactions.length === 0) {
                    showNotification('⚠️ No hay transacciones para el día de hoy');
                    return;
                }
    
                // Calcular resumen
                const summary = todayTransactions.reduce((acc, t) => {
                    acc.total += t.total;
                    acc.methods[t.method] = (acc.methods[t.method] || 0) + t.total;
                    return acc;
                }, { total: 0, methods: {} });
    
                // Generar HTML del resumen
                document.getElementById('dailySummary').innerHTML = `
                    <div style="background: rgba(255,255,255,0.1); padding: 20px; border-radius: 15px; margin-bottom: 20px;">
                        <h3 style="color: var(--accent); margin-bottom: 15px; text-align: center;">
                            Total del Día: $${summary.total.toLocaleString('es-CO')}
                        </h3>
                        ${Object.entries(summary.methods).map(([method, total]) => `
                            <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                                <span>${method.toUpperCase()}:</span>
                                <span>$${total.toLocaleString('es-CO')}</span>
                            </div>
                        `).join('')}
                    </div>
                    <table class="summary-table">
                        <thead>
                            <tr>
                                <th>Fecha/Hora</th>
                                <th>Cédula</th>
                                <th>Método</th>
                                <th>Total</th>
                                <th>Recibido</th>
                                <th>Cambio</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${todayTransactions.map(t => {
                                const date = new Date(t.date);
                                const formattedDate = date.toLocaleString('es-CO', {
                                    day: '2-digit',
                                    month: '2-digit',
                                    year: 'numeric',
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: true
                                });
                                
                                return `
                                    <tr>
                                        <td>${formattedDate}</td>
                                        <td>${t.clientId || 'N/A'}</td>
                                        <td>${t.method ? t.method.toUpperCase() : 'N/A'}</td>
                                        <td>$${(t.total || 0).toLocaleString('es-CO')}</td>
                                        <td>${t.method === 'cash' ? `$${(t.details?.received || 0).toLocaleString('es-CO')}` : '-'}</td>
                                        <td>${t.method === 'cash' ? `$${(t.details?.change || 0).toLocaleString('es-CO')}` : '-'}</td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>
                    <div class="print-button">
                        <button class="btn btn-print" onclick="printSummary()">
                            <i class="fas fa-print"></i> Imprimir Resumen
                        </button>
                        <button class="btn btn-print" onclick="sendToFlowsTable(${summary.total}, event)" style="background-color: #4CAF50;">
                            <i class="fas fa-paper-plane"></i> Enviar a Flujos
                        </button>
                    </div>
                `;
    
                // Mostrar el modal
                document.getElementById('summaryModal').style.display = 'flex';
                
            } catch (error) {
                console.error("Error en showDailySummary:", error);
                showNotification('❌ Error al generar el resumen diario');
            }
        }
    
        function sendToFlowsTable(total, event) {
            if (!total || total <= 0) {
                showNotification('❌ El monto debe ser mayor que cero');
                return;
            }
    
            const url = '{{ route("recepcionista.flujos.store-from-pos") }}';
            const button = event.target;
            const originalText = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
            button.disabled = true;
    
            // Configuración con CSRF token y manejo de errores mejorado
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
            
            if (!csrfToken) {
                showNotification('❌ Error de seguridad: Token CSRF no encontrado');
                button.innerHTML = originalText;
                button.disabled = false;
                return;
            }
    
            axios.post(url, {
                monto: total
            }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.data?.success) {
                    showNotification('✅ Datos enviados correctamente');
                    closeSummary();
                } else {
                    const errorMsg = response.data?.message || 'Error al guardar (sin mensaje)';
                    showNotification(`❌ ${errorMsg}`);
                }
            })
            .catch(error => {
                console.error('Error completo:', error);
                const errorMsg = error.response?.data?.message || 
                                error.response?.statusText || 
                                error.message || 
                                'Error desconocido al enviar';
                showNotification(`❌ ${errorMsg}`);
            })
            .finally(() => {
                button.innerHTML = originalText;
                button.disabled = false;
            });
        }
    
        function printSummary() {
            const printWindow = window.open('', 'Resumen Diario', 'width=800,height=600');
            const content = document.getElementById('dailySummary').innerHTML;
            
            printWindow.document.write(`
                <html>
                <head>
                    <title>Resumen Diario</title>
                    <style>
                        body { font-family: Arial, sans-serif; margin: 20px; }
                        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
                        th { background-color: #f2f2f2; }
                        .total-info { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
                        @media print {
                            body { margin: 0; padding: 10px; }
                            .print-button { display: none; }
                        }
                    </style>
                </head>
                <body>
                    <h1 style="text-align: center;">Resumen Diario</h1>
                    <div>${content}</div>
                </body>
                </html>
            `);
            
            printWindow.document.close();
            printWindow.print();
        }
    
        function closeSummary() {
            document.getElementById('summaryModal').style.display = 'none';
        }
    
        function clearTransaction() {
            currentTransaction = [];
            manualAmount = 0;
            document.getElementById('manualAmount').value = '';
            updateTransactionDisplay();
            showNotification('🔄 Transacción cancelada');
        }
    
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.padding = '15px 25px';
            notification.style.background = 'var(--primary)';
            notification.style.color = 'white';
            notification.style.borderRadius = '10px';
            notification.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
            notification.style.zIndex = '1000';
            notification.style.animation = 'fadeIn 0.3s ease';
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'fadeOut 0.3s ease';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    </script>
</body>
@endsection