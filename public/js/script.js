document.addEventListener('DOMContentLoaded', function() {
    const amountInput = document.querySelector('input[name="amount"]');
    
    if(amountInput) {
        amountInput.addEventListener('input', function(e) {
            const amount = parseFloat(e.target.value) || 0;
            const taxRate = 0.15; // 15% Standard Company Tax
            const calculatedTax = amount * taxRate;
            
            // You can add a span in your HTML to show this live
            console.log(`Estimated Tax: $${calculatedTax.toFixed(2)}`);
        });
    }
});