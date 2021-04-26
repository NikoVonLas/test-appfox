require('./bootstrap');

document.addEventListener('DOMContentLoaded', function(event) {
	console.log(`Current userId: ${window.userId}`);

	Echo.private(`notifications.user.${window.userId}`)
       	.notification((notification) => {
           console.log(notification);
   		});

	document.querySelector('[data-action="create-product"]').onclick = (e) => {
		axios.get(route('product.create', 1));
	};
	document.querySelector('[data-action="create-news"]').onclick = (e) => {
		axios.get(route('news.create', 1));
	};
});
