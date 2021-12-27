const ctx = document.querySelector('#myChart').getContext('2d');
const ages = document.querySelectorAll('.age');
let ageArr = [];
young = 0;
middle = 0;
old = 0;
for(i= 0; i < ages.length; i++) {
  ageArr[i] = ages[i].textContent;
}

for(i= 0; i < ageArr.length; i++) {
  if (ageArr[i] <= 25) {
    young += 1;
  }
  else if (ageArr[i] > 25 && ageArr[i] <= 35) {
    middle += 1;
  }
  else if (ageArr[i] > 35) {
    old += 1;
  }
}

const labels = [
  'Young',
  'Middle age',
  'Old',
];

const data = {
  labels,
  datasets: [{
      data: [young, middle, old],
      label: "Range of Age",
      backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
      ],
      borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
      ],
      borderWidth: 1,
      inflateAmount: 1,
  },],
};

const config = {
  type: 'bar',
  data: data,
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

const myChart = new Chart(ctx, config);
