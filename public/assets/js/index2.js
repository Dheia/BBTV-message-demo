$((function(o) {
	(t = document.getElementById("deals")).height = "225";
	var e = t.getContext("2d").createLinearGradient(0, 0, 0, 380);
	e.addColorStop(0, "#09ad95"), e.addColorStop(1, "#09ad95"), new Chart(t, {
		type: "bar",
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","july","Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: "Current Deals",
				data: [16, 14, 12, 14, 16, 15, 12, 14, 18, 10, 12, 10],
				backgroundColor: e,
				hoverBackgroundColor: e,
				hoverBorderWidth: 2,
				hoverBorderColor: "gradientStroke1"
			}]
		},
		options: {
			responsive: !0,
			maintainAspectRatio: !1,
			tooltips: {
				mode: "index",
				titleFontSize: 12,
				titleFontColor: "#000",
				bodyFontColor: "#000",
				backgroundColor: "#fff",
				cornerRadius: 3,
				intersect: !1
			},
			legend: {
				display: !1,
				labels: {
					usePointStyle: !0
				}
			},
			scales: {
				xAxes: [{
					barPercentage: .3,
					ticks: {
						fontColor: "#77778e"
					},
					display: !0,
					gridLines: {
						display: !1,
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "Month",
						fontColor: "#77778e"
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "transparent"
					},
					display: !0,
					gridLines: {
						display: !1,
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "sales",
						fontColor: "transparent"
					}
				}]
			},
			title: {
				display: !1,
				text: "Normal Legend"
			}
		}
	});
	var t, r = document.getElementById("total-coversations").getContext("2d");
	new Chart(r, {
		type: "line",
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: "Total-Transactions",
				borderColor: "#0774f8",
				borderWidth: 4,
				backgroundColor: "transparent",
				data: [0, 50, 0, 100, 50, 130, 100, 140, 50, 0, 100, 50, 130, 100, 140]
			}]
		},
		options: {
			responsive: !0,
			maintainAspectRatio: !1,
			tooltips: {
				mode: "index",
				titleFontSize: 12,
				titleFontColor: "#000",
				bodyFontColor: "#000",
				backgroundColor: "#fff",
				cornerRadius: 3,
				intersect: !1
			},
			legend: {
				display: !1,
				labels: {
					usePointStyle: !0
				}
			},
			scales: {
				xAxes: [{
					ticks: {
						fontColor: "#77778e"
					},
					display: !0,
					gridLines: {
						display: !0,
						color: "rgba(119, 119, 142, 0.2)",
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "Month",
						fontColor: "rgba(0,0,0,0.8)"
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#77778e"
					},
					display: !0,
					gridLines: {
						display: !1,
						color: "rgba(119, 119, 142, 0.2)",
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "sales",
						fontColor: "transparent"
					}
				}]
			},
			title: {
				display: !1,
				text: "Normal Legend"
			}
		}
	}), new Morris.Donut({
		element: "morrisBar8",
		data: [{
			value: 23,
			label: ""
		}, {
			value: 16,
			label: "Fullfilled"
		}, {
			value: 10,
			label: "Shipped"
		}, {
			value: 15,
			label: "Delivered"
		}],
		backgroundColor: "rgba(119, 119, 142, 0.2)",
		labelColor: "#77778e",
		colors: ["#0774f8", "#d43f8d", "#09ad95", "#f5334f"],
		formatter: function(o) {
			return o + "%"
		}
	}).on("click", (function(o, e) {
		console.log(o, e)
	})), (t = document.getElementById("revenue")).height = "300", t.getContext("2d"), new Chart(t, {
		type: "bar",
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
			datasets: [{
				label: "total profit",
				data: [15, 18, 12, 14, 10, 15, 7, 14],
				backgroundColor: "#d43f8d",
				hoverBackgroundColor: "#d43f8d",
				hoverBorderWidth: 2,
				hoverBorderColor: "#d43f8d"
			}, {
				label: "Total sales",
				data: [10, 14, 10, 15, 9, 14, 15, 20],
				backgroundColor: "#0774f8",
				hoverBackgroundColor: "#0774f8",
				hoverBorderWidth: 2,
				hoverBorderColor: "#0774f8"
			}]
		},
		options: {
			responsive: !0,
			maintainAspectRatio: !1,
			tooltips: {
				mode: "index",
				titleFontSize: 12,
				titleFontColor: "#000",
				bodyFontColor: "#000",
				backgroundColor: "#fff",
				cornerRadius: 3,
				intersect: !1
			},
			legend: {
				display: !1,
				labels: {
					usePointStyle: !0,
					fontFamily: "Montserrat"
				}
			},
			scales: {
				xAxes: [{
					barPercentage: .5,
					ticks: {
						fontColor: "#77778e"
					},
					display: !0,
					gridLines: {
						display: !0,
						color: "rgba(119, 119, 142, 0.2)",
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "Month",
						fontColor: "rgba(0,0,0,0.8)"
					}
				}],
				yAxes: [{
					ticks: {
						fontColor: "#77778e"
					},
					display: !0,
					gridLines: {
						display: !0,
						color: "rgba(119, 119, 142, 0.2)",
						drawBorder: !1
					},
					scaleLabel: {
						display: !1,
						labelString: "sales",
						fontColor: "rgba(0,0,0,0.81)"
					}
				}]
			},
			title: {
				display: !1,
				text: "Normal Legend"
			}
		}
	}), r = document.getElementById("areaChart1").getContext("2d"), new Chart(r, {
		type: "line",
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			type: "line",
			datasets: [{
				label: "Market value",
				data: [30, 70, 30, 100, 50, 130, 100, 140],
				backgroundColor: "transparent",
				borderColor: "#d43f8d",
				pointBackgroundColor: "#fff",
				pointHoverBackgroundColor: "#d43f8d",
				pointBorderColor: "#d43f8d",
				pointHoverBorderColor: "#d43f8d",
				pointBorderWidth: 2,
				pointRadius: 2,
				pointHoverRadius: 2,
				borderWidth: 4
			}]
		},
		options: {
			maintainAspectRatio: !1,
			legend: {
				display: !1
			},
			responsive: !0,
			tooltips: {
				mode: "index",
				titleFontSize: 12,
				titleFontColor: "#6b6f80",
				bodyFontColor: "#6b6f80",
				backgroundColor: "#fff",
				titleFontFamily: "Montserrat",
				bodyFontFamily: "Montserrat",
				cornerRadius: 3,
				intersect: !1
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: "transparent",
						zeroLineColor: "transparent"
					},
					ticks: {
						fontSize: 2,
						fontColor: "transparent"
					}
				}],
				yAxes: [{
					display: !1,
					ticks: {
						display: !1
					}
				}]
			},
			title: {
				display: !1
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	}), r = document.getElementById("areaChart2").getContext("2d"), new Chart(r, {
		type: "line",
		data: {
			labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			type: "line",
			datasets: [{
				label: "Total Revenue",
				data: [24, 18, 28, 21, 32, 28, 30],
				backgroundColor: "transparent",
				borderColor: "#09ad95",
				pointBackgroundColor: "#fff",
				pointHoverBackgroundColor: "#09ad95",
				pointBorderColor: "#09ad95",
				pointHoverBorderColor: "#09ad95",
				pointBorderWidth: 2,
				pointRadius: 2,
				pointHoverRadius: 2,
				borderWidth: 4
			}]
		},
		options: {
			maintainAspectRatio: !1,
			legend: {
				display: !1
			},
			responsive: !0,
			tooltips: {
				mode: "index",
				titleFontSize: 12,
				titleFontColor: "#6b6f80",
				bodyFontColor: "#6b6f80",
				backgroundColor: "#fff",
				titleFontFamily: "Montserrat",
				bodyFontFamily: "Montserrat",
				cornerRadius: 3,
				intersect: !1
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: "transparent",
						zeroLineColor: "transparent"
					},
					ticks: {
						fontSize: 2,
						fontColor: "transparent"
					}
				}],
				yAxes: [{
					display: !1,
					ticks: {
						display: !1
					}
				}]
			},
			title: {
				display: !1
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	})
}));