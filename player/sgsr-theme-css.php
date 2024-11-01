<style type="text/css">
:root {
    --sgsr-theme-pri: #7d55ff; /* Primary theme color */
    --sgsr-theme-sec: white;   /* Secondary theme color */
}

.pagination {
    --bs-pagination-active-bg: var(--sgsr-theme-pri);
    --bs-pagination-active-border-color: var(--sgsr-theme-pri);
    --bs-pagination-active-color: var(--sgsr-theme-sec);
/*    --bs-pagination-hover-bg: var(--sgsr-theme-pri);*/
/*    --bs-pagination-hover-border-color: var(--sgsr-theme-pri);*/
    --bs-pagination-hover-color: var(--sgsr-theme-pri);
    --bs-pagination-focus-bg: var(--sgsr-theme-pri);
    --bs-pagination-focus-border-color: var(--sgsr-theme-pri);
    --bs-pagination-focus-color: var(--sgsr-theme-sec);
    --bs-pagination-color: var(--sgsr-theme-pri);
}

	table.dataTable thead>tr>th.dt-orderable-asc, table.dataTable thead>tr>th.dt-orderable-desc, table.dataTable thead>tr>td.dt-orderable-asc, table.dataTable thead>tr>td.dt-orderable-desc {
    cursor: pointer;
    background-color: var(--sgsr-theme-pri);
    color: var(--sgsr-theme-sec);
    font-weight: 400;
}

table.dataTable thead>tr>th[data-dt-column], table.dataTable thead>tr>th.dt-orderable-desc, table.dataTable thead>tr>td[data-dt-column], table.dataTable thead>tr>td.dt-orderable-desc {
    cursor: pointer;
    background-color: var(--sgsr-theme-pri);
    color: var(--sgsr-theme-sec);
    font-weight: 400;
}


.col-6.d-flex.justify-content-start {
    margin-bottom: 6px;
}

div.dt-container .row {
    margin-bottom: 8px;
}


@media (max-width: 992px) {
    [center-text="1"] td,[center-text="1"] th{
		text-align: revert!important;
	}
}


</style>

