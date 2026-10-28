<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\App;


class AppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apps = [
            [
                'id'                => 1,
                'title'             => 'Product',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_product.png',
                'icon'              => 'icons/stock-icon.png',
                'description'       => 'The Products/Inventory/Stock Management App is a comprehensive solution designed to streamline and optimize the management of all your business\'s products and inventory. It ensures precise tracking, seamless reporting, and real-time updates, empowering your business to maintain optimal stock levels, minimize waste, and maximize efficiency. Whether managing raw materials, finished products, or supply items, this app covers all aspects of inventory control.',
                'tagline'           => 'Effortless Inventory Management, Tailored for Your Business.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-1-1.png',
                    'screenshots/screenshot-1-2.png',
                    'screenshots/screenshot-1-3.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Finished Product Management',
                        'text' => ['Monitor inventory levels of completed items',
                                    'Set reorder thresholds to avoid shortages',
                                    'Maintain accurate records for sales and stock projections'],
                        'image' => ['module/module-1-1.png'],
                    ],
                    [
                        'title' => 'Fixed Asset Management',
                        'text' => ['Asset categorization and depreciation tracking.',
                                    'Maintenance scheduling and reminders',
                                    'Detailed asset history for audits and reviews'],
                        'image' => ['module/module-1-2.png'],
                    ],
                    [
                        'title' => 'Supply Product Management ',
                        'text' => ['Efficient tracking of consumables and office supplies',
                                    'Improved purchase planning with supplier integration',
                                    'Real-time updates on usage and reorder needs'],
                        'image' => ['module/module-1-3.png'],
                    ],
                    [
                        'title' => 'Raw Material Management',
                        'text' => ['Track raw material levels and consumption rates',
                                    'Reduce production delays by ensuring timely restocking',
                                    'Generate detailed usage reports for better cost control'],
                        'image' => ['module/module-1-4.png'],

                    ],
                    [
                        'title' => 'Unit Management',
                        'text' =>[ 'Creation of custom units',
                                    'Conversion between units for seamless reporting',
                                    'Error-free tracking across all modules'],
                        'image' => ['module/module-1-5.png'],

                    ],
                    [
                        'title' => 'Barcode Printing',
                        'text' => ['Barcode generation for manufactured stocks (Ideal for Exporting)',
                                    'Quick and accurate scanning for stock updates',
                                    'Integration with inventory tracking for error-free management'],
                        'image' => ['module/module-1-6.jpg'],
                    ],
                    [
                        'title' => 'Product Report',
                        'text' => ['Historical data on product sales and stock levels',
                                    'Analysis of high-performing and slow-moving items',
                                    'Exportable reports for sharing with stakeholders'],
                        'image' => ['module/module-1-7.png'],

                    ],
                    [
                        'title' => 'Stock Report',
                        'text' => ['Comprehensive view of stock history across all locations',
                                    'Customizable filters to focus on specific product categories',
                                    'Timely updates to support informed decision-making'],
                        'image' => ['module/module-1-8.png'],
                    ],
                    [
                        'title' => 'Stock Alert Report',
                        'text' => ['Notifications for low stock and reorder levels',
                                    'Customizable thresholds for different product types',
                                    'Alerts sent via email or in-app notifications to relevant departments'],
                        'image' => ['module/module-1-9.png'],

                    ],
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-sync-alt',
                        'title' => 'Real Time Updates',
                        'description' => 'Keep your inventory data accurate and up-to-date at all times.',
                    ],
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Customizable Features',
                        'description' => 'Tailor the app to suit your unique business needs.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Integrated Reporting',
                        'description' => 'Gain actionable insights with detailed and dynamic reports.',
                    ],
                    [
                        'icon' => 'fas fa-user-friends',
                        'title' => 'User-Friendly Interface',
                        'description' => 'Navigate and operate with ease, even for non-technical staff.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-tachometer-alt',
                        'title' => 'Efficiency Gains',
                        'description' => 'Reduce manual errors and save time with automated processes.',
                    ],
                    [
                        'icon' => 'fas fa-dollar-sign',
                        'title' => 'Cost Reduction',
                        'description' => 'Optimize stock levels to avoid overstocking or stockouts.',
                    ],
                    [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Improved Decision-Making',
                        'description' => 'Utilize insightful reports to drive business growth.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Setup',
                        'description' => 'Configure supplier information and procurement policies.',
                    ],
                    [
                        'title' => 'Create',
                        'description' => 'Use the "Create Purchase" feature to initiate orders.',
                    ],
                    [
                        'title' => 'Analyze',
                        'description' => 'Compare supplier quotations and choose the best options.',
                    ],
                    [
                        'title' => 'Report',
                        'description' => 'Generate detailed reports to monitor procurement activities and outcomes.',
                    ],
                ]),
                
            ],

            [
                'id'                => 2,
                'title'             => 'Sales',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_sales.png',
                'icon'              => 'icons/sales-icon.png',
                'description'       => 'The Sales Management App is a robust solution designed to optimize and streamline your entire sales process. Whether you\'re managing quotes, tracking sales, or analyzing performance, this app empowers your business to drive growth and ensure customer satisfaction. With real-time updates, automated processes, and insightful reporting, you can stay ahead of the competition and focus on what matters most: closing deals and delighting customers.',
                'tagline'           => 'Sales Made Simple: Optimize Every Transaction.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-2-1.png',
                    'screenshots/screenshot-2-2.png',
                    'screenshots/screenshot-2-3.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Create Sale',
                        'text' => ['Quickly generate sales orders',
                                    'Customize sales details, including date, discounts and taxes',
                                    'Automate invoicing and order confirmations'],
                        'image' => ['module/module-2-1.png'],
                    ],
                    [
                        'title' => 'Point of Sale (POS)',
                        'text' => ['Real-time sales transactions with seamless integration to inventory ',
                                    'Support for multiple payment methods and currencies',
                                    'Simplified customer checkouts for improved satisfaction',
                                    'Automate invoicing for shops & restaurants'],
                        'image' => ['module/module-2-2.png'],
                    ],
                    [
                        'title' => 'Quotation / Proforma Management',
                        'text' => ['Generate and share professional sales quotations instantly',
                                    'Track the status of each quotation from draft to approval',
                                    'Maintain records of customer interactions for better follow-up'],
                        'image' => ['module/module-2-3.png'],
                    ],
                    [
                        'title' => 'Shipment and Delivery Status',
                        'text' => ['Monitor the status of shipments for transparency',
                                    'Automatically update customers with delivery timelines',
                                    'Reduce errors with integrated logistics tracking'],
                        'image' => ['module/module-2-4.png'],

                    ],
                    [
                        'title' => 'Sales Return Tracking',
                        'text' => ['Record and process sales returns efficiently',
                                    'Track reasons for returns to identify areas for improvement',
                                    'Ensure accurate inventory adjustments after returns    '],
                        'image' => ['module/module-2-5.png'],

                    ],
                    [
                        'title' => 'Sales Report',
                        'text' => ['Analyze overall sales trends and performance',
                                    'Track progress against sales targets',
                                    'Export data for stakeholder reviews or external audits'],
                        'image' => ['module/module-2-6.png'],

                    ],
                    [
                        'title' => 'Product Sales Report',
                        'text' => ['Monitor sales figures for individual products',
                                    'Identify high-demand items to adjust inventory strategies.',
                                    'Analyze profitability at the product level'],
                        'image' => ['module/module-2-7.png'],

                    ],
                    [
                        'title' => 'Top-Selling Products Report',
                        'text' => ['Identify bestsellers to prioritize in marketing campaigns',
                                    'Optimize stock levels for high-demand items',
                                    'Plan product launches and promotions strategically'],
                        'image' => ['module/module-2-8.png'],

                    ],
                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-tasks',
                        'title' => 'Comprehensive Sales Management',
                        'description' => 'Streamline every aspect of your sales process.',
                    ],
                    [
                        'icon' => 'fas fa-chart-pie',
                        'title' => 'Data-Driven Insights',
                        'description' => 'Make informed decisions with real-time analytics.',
                    ],
                    [
                        'icon' => 'fas fa-smile',
                        'title' => 'Customer-Centric Features',
                        'description' => 'Enhance customer satisfaction with transparent and efficient services.',
                    ],
                    [
                        'icon' => 'fas fa-layer-group',
                        'title' => 'Scalable Solution',
                        'description' => 'Adaptable to businesses of all sizes and industries.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Boost Sales Efficiency',
                        'description' => 'Automate repetitive tasks and focus on high-value activities.',
                    ],
                    [
                        'icon' => 'fas fa-smile',
                        'title' => 'Improve Customer Satisfaction',
                        'description' => 'Provide quick, transparent, and professional sales experiences.',
                    ],
                    [
                        'icon' => 'fas fa-dollar-sign',
                        'title' => 'Increase Profitability',
                        'description' => 'Optimize product offerings and pricing strategies with actionable insights.',
                    ],
                
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Set Up Your Sales System',
                        'description' => 'Configure your product catalogs, tax settings, and user permissions.',
                    ],
                    [
                        'title' => 'Manage Sales Transactions',
                        'description' => 'Use the app to create sales orders, quotations, and invoices.',
                    ],
                    [
                        'title' => 'Track Shipments and Returns',
                        'description' => 'Monitor deliveries and handle returns seamlessly.',
                    ],
                    [
                        'title' => 'Analyze Performance',
                        'description' => ' Access detailed reports to understand sales trends and optimize strategies.',
                    ],
                ]),
                
            ],

            [
                'id'                => 9,
                'title'             => 'Purchase',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_purchase.png',
                'icon'              => 'icons/purchase-icon.png',
                'description'       => 'The Purchase/Supply-Chain Management App is an integral component of the DrongoERP system, designed to streamline procurement processes, enhance supply chain visibility, and ensure efficient purchasing operations. This module is essential for businesses aiming to optimize their procurement activities, maintain cost efficiency, and foster supplier relationships. With user-friendly interfaces and advanced reporting tools, it empowers your organization to make informed purchasing decisions effortlessly.',
                'tagline'           => 'Streamline Your Procurement, Strengthen Your Supply Chain.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-9-1.png',
                    'screenshots/screenshot-9-2.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Create Purchase',
                        'text' => ['Generate purchase orders with ease',
                                    'Track purchase statuses from initiation to completion',
                                    'Automatically sync purchase orders with inventory to ensure stock accuracy'],
                        'image' => ['module/module-9-1.png'],
                    ],
                    [
                        'title' => 'Purchase Quotation Management',
                        'text' => ['Collect multiple purchase quotations from suppliers',
                                    'Compare and analyze quotations side by side',
                                    'Manage the selection of winning quotations with detailed justifications and audit trails',
                                    'Automatically document and archive supplier interactions for future reference'],
                        'image' => ['module/module-9-2.png'],
                    ],
                    [
                        'title' => 'Purchase Report',
                        'text' => ['Summary reports of all purchases made within a specified period',
                                    'Insights into spending patterns, helping to identify cost-saving opportunities',
                                    'Customizable reporting options to fit your business needs'],
                        'image' => ['module/module-9-3.png'],
                    ],
                    [
                        'title' => 'Product Purchases Report',
                        'text' => ['Detailed reports of individual product purchases',
                                    'Tracking of product-specific costs and supplier data',
                                    'Monitoring of purchase trends to inform future procurement strategies'],
                        'image' => ['module/module-9-4.png'],

                    ],
                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-sync-alt',
                        'title' => 'Real Time Updates',
                        'description' => 'Simplify complex procurement workflows.',
                    ],
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Customizable Features',
                        'description' => 'Foster better communication and collaboration with suppliers.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Integrated Reporting',
                        'description' => 'Gain a competitive edge through efficient and cost-effective procurement practices.',
                    ],
                    [
                        'icon' => 'fas fa-user-friends',
                        'title' => 'User-Friendly Interface',
                        'description' => 'Ensure a seamless integration of procurement with other business operations.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Enhanced Efficiency',
                        'description' => 'Reduce manual workload with automation and streamlined processes.',
                    ],
                    [
                        'icon' => 'fas fa-money-bill-wave',
                        'title' => 'Cost Savings',
                        'description' => 'Compare quotations effectively to ensure optimal purchasing decisions.',
                    ],
                    [
                        'icon' => 'fas fa-handshake',
                        'title' => 'Improved Supplier Relationships',
                        'description' => 'Manage supplier data and interactions systematically.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Data-Driven Decisions',
                        'description' => 'Leverage advanced reporting tools for informed procurement planning.',
                    ],[
                        'icon' => 'fas fa-shield-alt',
                        'title' => 'Compliance Assurance',
                        'description' => 'Maintain accurate records to meet regulatory requirements.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Setup',
                        'description' => 'Configure supplier information and procurement policies.',
                    ],
                    [
                        'title' => 'Create',
                        'description' => 'Use the "Create Purchase" feature to initiate orders.',
                    ],
                    [
                        'title' => 'Analyze',
                        'description' => 'Compare supplier quotations and choose the best options.',
                    ],
                    [
                        'title' => 'Report',
                        'description' => 'Generate detailed reports to monitor procurement activities and outcomes.',
                    ],
                ]),
                
            ],

            [
                'id'                => 10,
                'title'             => 'Marketing',
                'allDeviceImg'      => '',
                'icon'              => 'icons/marketing-icon.png',
                'description'       => 'The Marketing Management App empowers businesses to efficiently plan, execute, and analyze marketing campaigns across multiple channels. It simplifies lead management, enhances customer engagement, and automates repetitive tasks, helping you focus on crafting compelling marketing strategies. Whether you are nurturing leads or tracking campaign performance, this app ensures your marketing efforts yield maximum results.',
                'tagline'           => 'Drive Marketing Success with Precision and Power.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-1.png',
                    'screenshots/screenshot-2.png',
                    'screenshots/screenshot-3.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Leads Management',
                        'text' => ['Organize and prioritize leads based on engagement and potential',
                                    'Assign leads to sales teams for timely follow-ups',
                                    'Monitor the lead lifecycle to improve conversion rates'],
                        'image' => ['module/module-10.png'],
                    ],
                    [
                        'title' => 'Campaign Management',
                        'text' => ['Create and manage campaigns across email, social media, and other channels',
                                    'Set budgets, goals, and timelines for each campaign',
                                    'Analyze campaign performance with real-time metrics and ROI reports'],
                        'image' => ['module/module-10.png'],
                    ],
                    [
                        'title' => 'Contacts, Email, and Social Media Management',
                        'text' => ['Maintain a unified contact database for emails and social interactions',
                                    'Automate email campaigns and track open/click rates',
                                    'Schedule and manage social media posts to enhance brand visibility'],
                        'image' => ['module/module-10.png'],
                    ],
                    [
                        'title' => 'Customer Experience Tracking',
                        'text' => ['Monitor customer feedback and behavior across touchpoints',
                                    'Identify pain points and opportunities for improvement',
                                    'Personalize marketing efforts based on customer insights'],
                        'image' => ['module/module-10.png'],

                    ],
                    [
                        'title' => 'Marketing Automation',
                        'text' => ['Automate repetitive tasks like email sending, follow-ups, and data updates',
                                    'Use AI-powered tools to predict customer preferences and behaviors',
                                    'Create automated workflows for seamless lead nurturing'],
                        'image' => ['module/module-10.png'],

                    ],
                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-project-diagram',
                        'title' => 'End-to-End Marketing Solution',
                        'description' => 'Manage every aspect of your marketing strategy from one platform.',
                    ],
                    [
                        'icon' => 'fas fa-chart-pie',
                        'title' => 'Data-Driven Decisions',
                        'description' => 'Leverage analytics to make informed decisions and maximize ROI.',
                    ],
                    [
                        'icon' => 'fas fa-users',
                        'title' => 'Personalized Engagement',
                        'description' => 'Build stronger relationships through targeted and meaningful communication.',
                    ],
                    [
                        'icon' => 'fas fa-clock',
                        'title' => 'Time Efficiency',
                        'description' => 'Focus on strategy while automation handles the repetitive tasks.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-user-check',
                        'title' => 'Enhanced Lead Conversion',
                        'description' => 'Identify and nurture high-quality leads efficiently.',
                    ],
                    [
                        'icon' => 'fas fa-bullseye',
                        'title' => 'Improved Campaign Effectiveness',
                        'description' => 'Optimize campaigns with actionable insights and performance tracking.',
                    ],
                    [
                        'icon' => 'fas fa-bullhorn',
                        'title' => 'Stronger Brand Presence',
                        'description' => 'Centralize and streamline communication to amplify your brand’s voice.',
                    ],
                    [
                        'icon' => 'fas fa-tasks',
                        'title' => 'Increased Productivity',
                        'description' => 'Free up time for creative and strategic tasks through automation.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Set Up Your Campaigns',
                        'description' => 'Define objectives, target audiences, and channels for marketing initiatives.',
                    ],
                    [
                        'title' => 'Engage and Nurture Leads',
                        'description' => 'Use the Leads Management module to monitor and convert potential customers.',
                    ],
                    [
                        'title' => 'Leverage Automation',
                        'description' => 'Automate workflows for emails, social media posts, and customer follow-ups.',
                    ],
                    [
                        'title' => 'Track Performance',
                        'description' => 'Analyze real-time reports to understand campaign success and adjust strategies as needed.',
                    ],
                ]),
                
            ],

            [
                'id'                => 11,
                'title'             => 'Human Resource Management',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_HRM.png',
                'icon'              => 'icons/hrm-icon.png',
                'description'       => 'The Human Resource Management (HRM) App is a comprehensive solution designed to streamline all aspects of human resources, from recruitment to performance evaluation. This app empowers organizations to manage their workforce effectively, fostering productivity and satisfaction across teams. With features catering to both single and multi-company environments, it offers unmatched flexibility and scalability for businesses of all sizes.',
                'tagline'           => 'Empower Your Workforce, Simplify HR Management.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-11-1.png',
                    'screenshots/screenshot-11-2.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Department and Designation Management',
                        'text' => ['Defining and managing departments within the organization',
                                    'Assigning roles and designations to employees with clear hierarchical structures',
                                    'Simplifying reporting and departmental coordination'],
                        'image' => ['module/module-11-1.png'],
                    ],
                    [
                        'title' => 'Employee Database Management',
                        'text' => ['Securely store and access employee records, including personal details, job history, and credentials',
                                    'Streamline HR tasks with quick search and update capabilities',
                                    'Ensure compliance with data protection regulations'],
                        'image' => ['module/module-11-2.png'],
                    ],
                    [
                        'title' => 'Attendance, Shift, Leave, and Holiday Tracking',
                        'text' => ['Automate shift scheduling and track real-time attendance',
                                    'Manage leave requests and holiday calendars efficiently',
                                    'Generate reports for payroll and workforce planning'],
                        'image' => ['module/module-11-3.png'],
                    ],
                    [
                        'title' => 'Payroll and Allowance Management',
                        'text' => ['Automate salary calculations, including allowances, deductions, and taxes',
                                    'Generate pay slips and manage payments with ease',
                                    'Integrate with attendance and performance data for accurate compensation'],
                        'image' => ['module/module-11-4.png'],

                    ],
                    [
                        'title' => 'Recruitment and Agreement Management',
                        'text' => ['Tools to post job openings, collect applications, and manage candidate evaluations',
                                    'Agreement and contract generation to formalize employment terms',
                                    'Tracking of recruitment analytics to refine hiring strategies'],
                        'image' => ['module/module-11.png'],

                    ],
                    [
                        'title' => 'Training and Development Program',
                        'text' => ['Scheduling and tracking training sessions for skill enhancement',
                                    'Monitoring participation and certification',
                                    'Generating training impact reports to evaluate outcomes'],
                        'image' => ['module/module-11.png'],

                    ],
                    [
                        'title' => 'Target and KPI Tracking',
                        'text' => ['Set measurable targets and key performance indicators (KPIs) for employees',
                                    'Track progress in real time with automated updates',
                                    'Use data to identify high performers and improvement areas'],
                        'image' => ['module/module-11.png'],

                    ],
                    [
                        'title' => 'Performance Management',
                        'text' => ['Conduct periodic performance reviews with customizable templates',
                                    'Use multi-source feedback and analytics to ensure fair evaluations',
                                    'Identify top talent and succession planning opportunities'],
                        'image' => ['module/module-11-8.png'],

                    ],
                    [
                        'title' => 'HRM for Multiple Companies',
                        'text' => ['Switch between company profiles within a single interface',
                                    'Standardize policies and processes while maintaining company-specific flexibility',
                                    'Consolidate reports for cross-company insights and analytics'],
                        'image' => ['module/module-11-9.png'],

                    ],
                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-tools',
                        'title' => 'Comprehensive Features',
                        'description' => 'Covers every aspect of HR management under one roof.',
                    ],
                    [
                        'icon' => 'fas fa-arrows-alt',
                        'title' => 'Customizable and Scalable',
                        'description' => 'Tailor features to your specific needs and grow as your business expands.',
                    ],
                    [
                        'icon' => 'fas fa-users-cog',
                        'title' => 'Seamless Integration',
                        'description' => 'Works flawlessly with payroll, attendance, and performance modules.',
                    ],
                    [
                        'icon' => 'fas fa-chalkboard',
                        'title' => 'User-Friendly Interface',
                        'description' => 'Simplifies complex HR tasks for HR teams and managers alike',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-robot',
                        'title' => 'Enhanced Efficiency',
                        'description' => 'Automate routine tasks and reduce manual errors.',
                    ],
                    [
                        'icon' => 'fas fa-shield-alt',
                        'title' => 'Improved Compliance',
                        'description' => 'Ensure adherence to labor laws and regulations.',
                    ],
                    [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Data-Driven Decisions',
                        'description' => 'Use real-time analytics to make informed HR decisions.',
                    ],
                    [
                        'icon' => 'fas fa-smile',
                        'title' => 'Employee Satisfaction',
                        'description' => 'Foster a positive workplace culture with streamlined processes.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Set Up',
                        'description' => 'Configure departments, roles, and policies in the system.',
                    ],
                    [
                        'title' => 'Manage Workforce',
                        'description' => 'Add employee details, assign roles, and track attendance.',
                    ],
                    [
                        'title' => 'Track Progress',
                        'description' => 'Monitor performance, training, and recruitment activities.',
                    ],
                    [
                        'title' => 'Evaluate and Optimize',
                        'description' => 'Use analytics and reports to refine HR strategies.',
                    ],
                ]),
                
            ],

            [
                'id'                => 23,
                'title'             => 'Warehouse',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_warehouse.png',
                'icon'              => 'icons/stock-icon.png',
                'description'       => 'The Warehouse Management App is a powerful tool designed to provide complete control and visibility over your warehouse operations. From tracking activities to generating insightful reports, this app ensures efficient stock management and operational excellence across all warehouse locations. Tailored to meet the needs of modern businesses, it supports decision-making with detailed analytics and real-time data.',
                'tagline'           => 'Maximize Warehouse Efficiency with Real-Time Control.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-23-1.png',
                    'screenshots/screenshot-23-2.png',
                    'screenshots/screenshot-23-3.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Create Warehouse',
                        'text' => ['Configure unique warehouse profiles tailored to your business',
                                    'Assign specific roles and permissions to manage individual warehouses',
                                    'Seamlessly integrate with other modules for streamlined operations'],
                        'image' => ['module/module-23-1.png'],
                    ],
                    [
                        'title' => 'Tailored Price Adjustment per Warehouse',
                        'text' => ['Customize prices for products based on warehouse-specific factors',
                                    'Ensure competitive pricing that aligns with regional market demands',
                                    'Monitor pricing adjustments with a clear audit trail'],
                        'image' => ['module/module-23-2.png'],
                    ],
                    [
                        'title' => 'Warehouse Report',
                        'text' => ['Generate summaries of stock levels, inbound and outbound activities',
                                    'Identify trends and patterns to make informed business decisions',
                                    'Export reports for further analysis or sharing with stakeholders'],
                        'image' => ['module/module-23-3.png'],
                    ],
                    [
                        'title' => 'Track All Activities of the Warehouse',
                        'text' => ['Monitor activities from purchase, sales, manufacturing, transfers, and returns',
                                    'Track financial movements and expenses related to warehouse operations',
                                    'Maintain comprehensive logs for accountability and audits'],
                        'image' => ['module/module-23-4.png'],

                    ],
                    [
                        'title' => 'Graphical Comparison Between Branches',
                        'text' => ['Compare item and quantity sold across different branches',
                                    'Evaluate price and cost dynamics for improved profitability',
                                    'Visualize data through user-friendly graphs and charts'],
                        'image' => ['module/module-23-5.png'],

                    ],
                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-cogs',
                        'title' => 'Comprehensive Control',
                        'description' => 'Manage all aspects of warehouse operations from a single platform.',
                    ],
                    [
                        'icon' => 'fas fa-eye',
                        'title' => 'Enhanced Visibility',
                        'description' => 'Access real-time data for better decision-making.',
                    ],
                    [
                        'icon' => 'fas fa-network-wired',
                        'title' => 'Seamless Integration',
                        'description' => 'Works perfectly with other ERP modules for end-to-end operational efficiency.',
                    ],
                    [
                        'icon' => 'fas fa-chart-line',
                        'title' => 'Data-Driven Insights',
                        'description' => 'Leverage analytics and graphical reports for strategic planning.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-boxes',
                        'title' => 'Optimized Inventory Levels',
                        'description' => 'Prevent overstocking and stockouts with accurate tracking.',
                    ],
                    [
                        'icon' => 'fas fa-dollar-sign',
                        'title' => 'Cost Savings',
                        'description' => 'Reduce operational expenses through better management of resources.',
                    ],
                    [
                        'icon' => 'fas fa-clock',
                        'title' => 'Improved Efficiency',
                        'description' => 'Minimize delays with real-time activity monitoring.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Enhanced Performance',
                        'description' => 'Compare and benchmark branch-level activities to identify areas for improvement.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Set Up Warehouses',
                        'description' => 'Create individual warehouse profiles and configure settings based on location.',
                    ],
                    [
                        'title' => 'Track Activities',
                        'description' => 'Monitor transactions and activities in real time across all warehouses.',
                    ],
                    [
                        'title' => 'Analyze Reports',
                        'description' => 'Use detailed and graphical reports to understand performance and trends.',
                    ],
                    [
                        'title' => 'Adjust Prices Dynamically',
                        'description' => 'Tailor pricing per warehouse to align with regional and operational needs.',
                    ],
                ]),
                
            ],

            [
                'id'                => 24,
                'title'             => 'Transfer',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_transfer.png',
                'icon'              => 'icons/stock-icon.png',
                'description'       => 'The Transfer Management App is a robust tool designed to streamline and monitor product transfers and logistics across multiple locations. From tracking the movement of goods to generating comprehensive reports, this app ensures seamless coordination and transparency in your transfer processes. It is ideal for businesses that manage inventory across warehouses, branches, or delivery networks.',
                'tagline'           => 'Track Transfers with Precision, Every Step of the Way.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-24-1.png',
                    'screenshots/screenshot-24-2.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Transfer and Logistics Tracking',
                        'text' => ['Track shipments in real time from dispatch to delivery',
                                    'Ensure accurate documentation of transfer details, including origin, destination, and transit time',
                                    'Minimize delays with automated notifications and tracking updates'],
                        'image' => ['module/module-24-1.png'],
                    ],
                    [
                        'title' => 'Transfer Report',
                        'text' => ['Generate reports summarizing all transfers within a given timeframe',
                                    'Analyze trends in transfer frequency and volume',
                                    'Export and share reports for operational reviews and decision-making'],
                        'image' => ['module/module-24-2.png'],
                    ],
                    [
                        'title' => 'Product Transfer Report',
                        'text' => ['Track the movement of individual items or product categories',
                                    'Identify bottlenecks in the transfer process for specific products',
                                    'Ensure accurate stock updates by reconciling transfers with inventory records'],
                        'image' => ['module/module-24-3.png'],
                    ],                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-map-marked-alt',
                        'title' => 'Enhanced Visibility',
                        'description' => 'Gain full control over logistics and product transfers.',
                    ],
                    [
                        'icon' => 'fas fa-check-circle',
                        'title' => 'Error-Free Operations',
                        'description' => 'Reduce inaccuracies with automated tracking and reporting',
                    ],
                    [
                        'icon' => 'fas fa-exchange-alt',
                        'title' => 'Seamless Integration',
                        'description' => 'Integrate transfer management with your inventory and warehouse modules for smooth workflows.',
                    ],
                    [
                        'icon' => 'fas fa-expand',
                        'title' => 'Scalable Solution',
                        'description' => 'Adaptable for businesses of all sizes, from small enterprises to large corporations.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-truck',
                        'title' => 'Improved Logistics Efficiency',
                        'description' => 'Minimize transfer delays and optimize routing.',
                    ],
                    [
                        'icon' => 'fas fa-dollar-sign',
                        'title' => 'Cost Savings',
                        'description' => 'Avoid unnecessary transfers and reduce operational costs.',
                    ],
                    [
                        'icon' => 'fas fa-warehouse',
                        'title' => 'Better Inventory Management',
                        'description' => 'Maintain accurate stock records across locations.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Actionable Insights',
                        'description' => 'Use transfer data to inform strategic decisions and improve supply chain performance.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Initiate Transfers',
                        'description' => 'Set up transfer requests between warehouses or branches.',
                    ],
                    [
                        'title' => 'Track Movement',
                        'description' => 'Monitor real-time progress of goods during transit.',
                    ],
                    [
                        'title' => 'Analyze Data',
                        'description' => 'Use detailed reports to evaluate transfer efficiency and logistics performance.',
                    ],
                    [
                        'title' => 'Integrate Systems',
                        'description' => 'Sync with inventory and warehouse management for automated updates.',
                    ],
                ]),
                
            ],

            [
                'id'                => 25,
                'title'             => 'Expenses',
                'allDeviceImg'      => 'DrongoERPImg/DrongoERP_expense.png',
                'icon'              => 'icons/stock-icon.png',
                'description'       => 'The Expenses Management App is an intuitive and powerful solution designed to simplify the tracking, reporting, and management of your business expenses. With this app, you can gain full control over expense monitoring, ensure transparency, and streamline the payment process. Whether for operational, project-based, or miscellaneous expenses, this app ensures that your financial outflows are well-managed and accurately recorded.',
                'tagline'           => 'Simplify Expense Management, Maximize Financial Control.',
                'screenshot'        => json_encode([
                    'screenshots/screenshot-25-1.png',
                    'screenshots/screenshot-25-2.png',
                    'screenshots/screenshot-25-3.png',
                ]),

                'module' => json_encode([
                    [
                        'title' => 'Create and Track Expenses',
                        'text' => ['Record one-time or recurring expenses with detailed descriptions',
                                    'Categorize expenses (e.g., travel, utilities, operational costs) for easy tracking',
                                    'Monitor pending, approved, and reimbursed expenses in real-time'],
                        'image' => ['module/module-25-1.png'],
                    ],
                    [
                        'title' => 'Expense Report',
                        'text' => ['View consolidated expense data across categories and timeframes',
                                    'Analyze spending trends to identify cost-saving opportunities',
                                    'Export detailed reports for accounting and audits'],
                        'image' => ['module/module-25-2.png'],
                    ],
                    [
                        'title' => 'Expense Payments Report',
                        'text' => ['Monitor the status of payments (e.g., pending, processed, reimbursed)',
                                    'Generate payment-specific reports, including payee details and payment modes',
                                    'Ensure accuracy and consistency in expense-related financial records'],
                        'image' => ['module/module-25-3.png'],
                    ],                    
                ]),

                'procedure' => json_encode([
                    [
                        'icon' => 'fas fa-map-marked-alt',
                        'title' => 'Streamlined Operations',
                        'description' => 'Simplifies expense management and reporting, saving time and effort.',
                    ],
                    [
                        'icon' => 'fas fa-check-circle',
                        'title' => 'Transparency and Control',
                        'description' => ' Provides a clear overview of financial outflows, ensuring accountability.',
                    ],
                    [
                        'icon' => 'fas fa-exchange-alt',
                        'title' => 'Customizable and Scalable',
                        'description' => 'Adapts to the unique needs of businesses of any size.',
                    ],
                    [
                        'icon' => 'fas fa-expand',
                        'title' => 'Seamless Integration',
                        'description' => 'Easily integrates with other financial and ERP modules.',
                    ],
                ]),

                'benefit' => json_encode([
                    [
                        'icon' => 'fas fa-truck',
                        'title' => 'Improved Financial Planning',
                        'description' => 'Keep track of expenses to ensure budgets are maintained.',
                    ],
                    [
                        'icon' => 'fas fa-dollar-sign',
                        'title' => 'Cost Optimization',
                        'description' => 'Identify areas to cut unnecessary costs and maximize efficiency.',
                    ],
                    [
                        'icon' => 'fas fa-warehouse',
                        'title' => 'Enhanced Transparency',
                        'description' => 'Create detailed records for better accountability and compliance.',
                    ],
                    [
                        'icon' => 'fas fa-chart-bar',
                        'title' => 'Time Savings',
                        'description' => 'Automate expense tracking and reporting to reduce manual work.',
                    ],
                ]),

                'step' => json_encode([
                    [
                        'title' => 'Set Up',
                        'description' => 'Configure expense categories, permissions, and workflows.',
                    ],
                    [
                        'title' => 'Record Expenses',
                        'description' => 'Add expenses with descriptions, amounts, and categories.',
                    ],
                    [
                        'title' => 'Monitor and Approve',
                        'description' => 'Track expenses in real time, approve or reject claims as needed',
                    ],
                    [
                        'title' => 'Generate Reports',
                        'description' => 'Access detailed reports to analyze spending and ensure compliance',
                    ],
                ]),
                
            ],

        ];

        App::insert($apps);

    }
}
