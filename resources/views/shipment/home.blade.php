<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARGO TRACKING • AWB {{ $shipment->awb_number }} • Global Logistics Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;500;600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-blue: #1e40af;
            --accent-blue: #3b82f6;
            --status-green: #10b981;
            --status-yellow: #f59e0b;
            --status-red: #ef4444;
            --neutral-gray: #64748b;
            --light-gray: #f8fafc;
            --border-gray: #e2e8f0;
            --card-bg: #ffffff;
            --terminal-bg: #0a0f1f;
            --cyber-blue: #00d4ff;
            --cyber-purple: #8b5cf6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #0a0f1f 0%, #0f172a 100%);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #e2e8f0;
            line-height: 1.5;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Animated Background */
        .bg-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(59, 130, 246, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .scan-line {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(0, 212, 255, 0.3) 50%, 
                transparent 100%);
            z-index: 999;
            animation: scan 3s linear infinite;
            box-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
        }

        @keyframes scan {
            0% { transform: translateY(-100px); }
            100% { transform: translateY(100vh); }
        }

        /* Header */
        .system-header {
            background: rgba(15, 23, 42, 0.95);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .system-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .system-info {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .system-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 0.8rem;
            background: linear-gradient(135deg, 
                rgba(59, 130, 246, 0.15) 0%, 
                rgba(59, 130, 246, 0.05) 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 4px;
            font-family: 'Roboto Mono', monospace;
            font-size: 0.8rem;
            color: var(--cyber-blue);
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .system-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.1), 
                transparent);
            transition: 0.5s;
        }

        .system-badge:hover::before {
            left: 100%;
        }

        .system-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 212, 255, 0.3);
            border-color: var(--cyber-blue);
        }

        .system-badge i {
            font-size: 0.9rem;
        }

        .timestamp {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.85rem;
            color: #94a3b8;
            animation: pulse 2s infinite;
        }

        /* Main Container */
        .dashboard-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* AWB Terminal */
        .awb-terminal {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 16px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                        0 0 0 1px rgba(59, 130, 246, 0.1) inset;
            animation: terminalGlow 4s infinite alternate;
        }

        @keyframes terminalGlow {
            0% { 
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                            0 0 0 1px rgba(59, 130, 246, 0.1) inset,
                            0 0 20px rgba(59, 130, 246, 0.1);
            }
            100% { 
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                            0 0 0 1px rgba(59, 130, 246, 0.1) inset,
                            0 0 40px rgba(59, 130, 246, 0.2);
            }
        }

        .awb-terminal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--cyber-blue), 
                var(--cyber-purple), 
                var(--accent-blue),
                transparent);
            animation: gradientFlow 3s infinite linear;
            background-size: 200% 100%;
        }

        @keyframes gradientFlow {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .awb-label {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .awb-label-text {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.85rem;
            color: var(--cyber-blue);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 600;
            animation: blink 2s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .awb-number {
            font-family: 'Roboto Mono', monospace;
            font-size: 3rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5),
                         0 0 20px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, #ffffff, var(--cyber-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: numberGlow 3s infinite alternate;
        }

        @keyframes numberGlow {
            0% { 
                text-shadow: 0 0 10px rgba(59, 130, 246, 0.5),
                             0 0 20px rgba(59, 130, 246, 0.3);
            }
            100% { 
                text-shadow: 0 0 20px rgba(59, 130, 246, 0.8),
                             0 0 40px rgba(59, 130, 246, 0.5);
            }
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            margin-top: 1rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .status-indicator:hover {
            transform: translateY(-2px);
            border-color: var(--cyber-blue);
            box-shadow: 0 4px 20px rgba(0, 212, 255, 0.2);
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #94a3b8;
            animation: pulse 2s infinite;
            position: relative;
        }

        .status-dot::before {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            border-radius: 50%;
            animation: ripple 2s infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.5;
                border: 2px solid currentColor;
            }
            100% {
                transform: scale(2);
                opacity: 0;
                border: 2px solid currentColor;
            }
        }

        .status-dot.active {
            background: var(--status-green);
            color: var(--status-green);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
        }

        .status-dot.pending {
            background: var(--status-yellow);
            color: var(--status-yellow);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.5);
        }

        .status-dot.in-transit {
            background: var(--accent-blue);
            color: var(--accent-blue);
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }

        .status-text {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem;
            color: #e2e8f0;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Metrics Dashboard */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .metric-card {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 1.75rem;
            position: relative;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            overflow: hidden;
            animation: cardAppear 0.6s ease-out forwards;
            animation-delay: calc(var(--i) * 0.1s);
            opacity: 0;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, 
                transparent, 
                var(--cyber-blue), 
                transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .metric-card:hover::before {
            opacity: 1;
        }

        .metric-card:hover {
            border-color: var(--cyber-blue);
            transform: translateY(-5px);
            box-shadow: 0 8px 32px rgba(0, 212, 255, 0.15),
                        0 0 0 1px rgba(0, 212, 255, 0.1) inset;
        }

        .metric-value {
            font-family: 'Roboto Mono', monospace;
            font-size: 1.75rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff, var(--cyber-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all 0.3s ease;
        }

        .metric-card:hover .metric-value {
            transform: scale(1.05);
        }

        .metric-label {
            font-size: 0.8rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        /* Grid Layout */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2.5rem;
            margin-bottom: 2rem;
        }

        /* Shipment Details */
        .detail-panel {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 12px;
            padding: 2.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.2);
            margin-bottom: 1.5rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            animation: panelSlideUp 0.6s ease-out forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        @keyframes panelSlideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .detail-panel:hover {
            border-color: var(--cyber-blue);
            box-shadow: 0 8px 32px rgba(0, 212, 255, 0.1);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(59, 130, 246, 0.1);
        }

        .panel-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--cyber-blue);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .panel-title i {
            color: var(--cyber-blue);
            font-size: 1.2rem;
            filter: drop-shadow(0 0 8px rgba(0, 212, 255, 0.5));
        }

        .panel-subtitle {
            font-size: 0.85rem;
            color: var(--neutral-gray);
            font-family: 'Roboto Mono', monospace;
        }

        /* Information Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .info-section {
            margin-bottom: 2rem;
            position: relative;
        }

        .info-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -1rem;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, 
                transparent, 
                var(--cyber-blue), 
                transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .info-section:hover::before {
            opacity: 1;
        }

        .info-label {
            display: block;
            font-size: 0.8rem;
            color: var(--cyber-blue);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1rem;
            font-weight: 600;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .info-label::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background: var(--cyber-blue);
            animation: expandWidth 1s ease-out;
        }

        @keyframes expandWidth {
            from { width: 0; }
            to { width: 50px; }
        }

        .info-value {
            font-size: 0.95rem;
            color: #e2e8f0;
            font-weight: 500;
            line-height: 1.8;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .info-value.mono {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.9rem;
            color: var(--cyber-blue);
        }

        .info-value.strong {
            font-weight: 600;
            color: #ffffff;
        }

        .field-label {
            color: #94a3b8;
            font-weight: 500;
            margin-right: 0.5rem;
        }

        .info-divider {
            height: 1px;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(59, 130, 246, 0.3), 
                transparent);
            margin: 2rem 0;
            animation: expandWidth 1.5s ease-out;
        }

        /* Tracking Timeline */
        .tracking-timeline {
            background: rgba(15, 23, 42, 0.8);
            border-radius: 12px;
            padding: 2.5rem;
            border: 1px solid rgba(59, 130, 246, 0.2);
            height: fit-content;
            position: sticky;
            top: 120px;
            backdrop-filter: blur(10px);
            animation: timelineAppear 0.6s ease-out forwards;
            animation-delay: 0.4s;
            opacity: 0;
        }

        @keyframes timelineAppear {
            from {
                opacity: 0;
                transform: translateX(40px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .timeline-container {
            position: relative;
            padding-left: 2.5rem;
            margin-top: 1.5rem;
        }

        .timeline-line {
            position: absolute;
            left: 0.95rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, 
                rgba(59, 130, 246, 0.1), 
                rgba(59, 130, 246, 0.3));
            z-index: 1;
        }

        .timeline-progress {
            position: absolute;
            left: 0.95rem;
            top: 0;
            width: 2px;
            background: linear-gradient(to bottom, 
                var(--status-green), 
                var(--accent-blue));
            z-index: 2;
            animation: progressGrow 2s ease-out forwards;
            transform-origin: top;
        }

        @keyframes progressGrow {
            from { transform: scaleY(0); }
            to { transform: scaleY(1); }
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
            padding-left: 1.5rem;
            opacity: 0;
            animation: timelineItemAppear 0.6s ease-out forwards;
            animation-delay: calc(var(--item-index) * 0.2s);
        }

        @keyframes timelineItemAppear {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .timeline-dot {
            position: absolute;
            left: -1.1rem;
            top: 0.25rem;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: rgba(15, 23, 42, 0.9);
            border: 3px solid;
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .timeline-dot.active {
            border-color: var(--accent-blue);
            background: var(--accent-blue);
            box-shadow: 0 0 0 8px rgba(59, 130, 246, 0.2),
                        0 0 20px rgba(59, 130, 246, 0.4);
            animation: activePulse 2s infinite;
        }

        @keyframes activePulse {
            0%, 100% { 
                box-shadow: 0 0 0 8px rgba(59, 130, 246, 0.2),
                            0 0 20px rgba(59, 130, 246, 0.4);
            }
            50% { 
                box-shadow: 0 0 0 12px rgba(59, 130, 246, 0.1),
                            0 0 30px rgba(59, 130, 246, 0.6);
            }
        }

        .timeline-dot.completed {
            border-color: var(--status-green);
            background: var(--status-green);
            box-shadow: 0 0 0 6px rgba(16, 185, 129, 0.2),
                        0 0 15px rgba(16, 185, 129, 0.3);
        }

        .timeline-dot.completed i {
            color: white;
            font-size: 0.7rem;
            animation: checkPop 0.4s ease-out;
        }

        @keyframes checkPop {
            0% { transform: scale(0); }
            70% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .timeline-content {
            background: rgba(30, 41, 59, 0.3);
            padding: 1.5rem;
            border-radius: 8px;
            border-left: 3px solid var(--accent-blue);
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateX(5px);
            background: rgba(30, 41, 59, 0.5);
            border-left-color: var(--cyber-blue);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .timeline-title {
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .timeline-subtitle {
            font-size: 0.85rem;
            color: #cbd5e1;
            margin-bottom: 0.5rem;
            line-height: 1.5;
        }

        .timeline-time {
            font-family: 'Roboto Mono', monospace;
            font-size: 0.8rem;
            color: var(--cyber-blue);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Current Status */
        .current-status {
            background: linear-gradient(135deg, 
                rgba(30, 58, 138, 0.8) 0%, 
                rgba(30, 64, 175, 0.8) 100%);
            color: white;
            padding: 2rem;
            border-radius: 12px;
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            animation: statusAppear 0.6s ease-out forwards;
            animation-delay: 0.6s;
            opacity: 0;
        }

        @keyframes statusAppear {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .current-status::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, 
                rgba(255, 255, 255, 0.1) 0%, 
                transparent 70%);
            animation: rotate 8s infinite linear;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .status-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .status-main {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            animation: textGlow 2s infinite alternate;
        }

        @keyframes textGlow {
            from { text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); }
            to { text-shadow: 0 2px 20px rgba(255, 255, 255, 0.2); }
        }

        .eta-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .eta-label {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        .eta-value {
            font-family: 'Roboto Mono', monospace;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        /* Data Tables */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .data-table th {
            text-align: left;
            padding: 1.25rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--cyber-blue);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid rgba(59, 130, 246, 0.2);
            background: rgba(30, 41, 59, 0.3);
        }

        .data-table td {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(59, 130, 246, 0.1);
            font-size: 0.9rem;
            color: #e2e8f0;
            transition: all 0.3s ease;
        }

        .data-table tr {
            transition: all 0.3s ease;
        }

        .data-table tr:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        /* Footer */
        .system-footer {
            margin-top: 4rem;
            padding-top: 2.5rem;
            border-top: 1px solid rgba(59, 130, 246, 0.2);
            text-align: center;
            color: var(--neutral-gray);
            font-size: 0.85rem;
            animation: fadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }

        .system-footer a {
            color: var(--cyber-blue);
            text-decoration: none;
            position: relative;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .system-footer a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 1px;
            background: var(--cyber-blue);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .system-footer a:hover {
            color: white;
            text-shadow: 0 0 10px rgba(0, 212, 255, 0.5);
        }

        .system-footer a:hover::after {
            width: 100%;
        }

        .system-footer .mt-2 {
            font-family: 'Roboto Mono', monospace;
            color: #94a3b8;
            margin-top: 1.5rem;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.6);
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.1);
            display: inline-block;
            animation: infoPulse 3s infinite ease-in-out;
        }

        @keyframes infoPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .tracking-timeline {
                position: static;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1.5rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .metrics-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .awb-number {
                font-size: 2.2rem;
            }
            
            .system-info {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .system-header .container {
                flex-direction: column;
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .metrics-grid {
                grid-template-columns: 1fr;
            }
            
            .awb-number {
                font-size: 1.8rem;
            }
            
            .detail-panel,
            .tracking-timeline {
                padding: 1.5rem;
            }
            
            .panel-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(15, 23, 42, 0.6);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, 
                var(--accent-blue), 
                var(--cyber-blue));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, 
                var(--cyber-blue), 
                var(--cyber-purple));
        }

        /* Loading Animation */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--terminal-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(59, 130, 246, 0.1);
            border-top: 4px solid var(--cyber-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading" id="loadingOverlay">
        <div class="loader"></div>
    </div>

    <!-- Animated Background -->
    <div class="bg-grid"></div>
    <div class="scan-line"></div>

    <!-- System Header -->
    <header class="system-header">
        <div class="container">
            <div class="system-info">
                <div class="system-badge">
                    <i class="bi bi-globe"></i>
                    <span>GLOBAL LOGISTICS NETWORK</span>
                </div>
                <div class="system-badge">
                    <i class="bi bi-shield-check"></i>
                    <span>CARGO TRACKING SYSTEM v4.2</span>
                </div>
            </div>
            <div class="timestamp" id="liveTimestamp">
                {{ now()->format('d M Y H:i:s') }} UTC
            </div>
        </div>
    </header>

    <!-- Main Dashboard -->
    <main class="dashboard-container">
        <!-- AWB Terminal -->
        <div class="awb-terminal">
            <div class="awb-label">
                <div class="awb-label-text">AIR WAYBILL</div>
                <div class="system-badge">ACTIVE • REAL-TIME TRACKING</div>
            </div>
            <div class="awb-number" id="awbNumber">{{ $shipment->awb_number }}</div>
            <div class="status-indicator">
                <div class="status-dot {{ strtolower(str_replace(' ', '-', $shipment->status)) }}"></div>
                <div class="status-text">
                    {{ $shipment->status }}
                </div>
            </div>
        </div>

        <!-- Metrics Dashboard -->
        <div class="metrics-grid">
            <div class="metric-card" style="--i: 0;">
                <div class="metric-value">{{ $shipment->pieces }} PCS</div>
                <div class="metric-label">TOTAL PIECES</div>
            </div>
            <div class="metric-card" style="--i: 1;">
                <div class="metric-value">{{ $shipment->gross_weight }} KG</div>
                <div class="metric-label">GROSS WEIGHT</div>
            </div>
            {{-- <div class="metric-card" style="--i: 2;">
                <div class="metric-value">{{ $shipment->chargeable_weight }} KG</div>
                <div class="metric-label">CHARGEABLE WEIGHT</div>
            </div> --}}
            <div class="metric-card" style="--i: 3;">
                <div class="metric-value">{{ $shipment->currency }} {{ number_format($shipment->declared_carriage, 2) }}</div>
                <div class="metric-label">DECLARED VALUE</div>
            </div>
            <div class="metric-card" style="--i: 4;">
                <div class="metric-value">{{ $shipment->shipment_type }}</div>
                <div class="metric-label">SERVICE TYPE</div>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="dashboard-grid">
            <!-- Left Column - Details -->
            <div>
                <!-- Shipment Parties -->
                <div class="detail-panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <i class="bi bi-diagram-3"></i>
                            SHIPMENT PARTIES
                        </div>
                        <div class="panel-subtitle">CONSIGNMENT DETAILS</div>
                    </div>
                    
                    <div class="info-grid">
                        <!-- Shipper -->
                        <div class="info-section">
                            <div class="info-label">Shipper / Consignor</div>
                            <div class="info-value strong">
                                <span class="field-label">Company:</span> {{ $shipment->shipper_company }}
                            </div>
                            {{-- <div class="info-value">
                                <span class="field-label">Contact Person:</span> {{ $shipment->shipper_contact }}
                            </div> --}}
                            <div class="info-value">
                                <span class="field-label">Address:</span> {{ $shipment->shipper_address }}
                            </div>
                            <div class="info-value">
                                <span class="field-label">City / Country:</span> {{ $shipment->shipper_city }}, {{ $shipment->shipper_country }}
                            </div>
                            @if($shipment->shipper_phone)
                            <div class="info-value mono">
                                <span class="field-label">Phone:</span> {{ $shipment->shipper_phone }}
                            </div>
                            @endif
                            {{-- @if($shipment->shipper_department)
                            <div class="info-value">
                                <span class="field-label">Department:</span> {{ $shipment->shipper_department }}
                            </div>
                            @endif --}}
                        </div>

                        <!-- Receiver -->
                        <div class="info-section">
                            <div class="info-label">Consignee / Receiver</div>
                            <div class="info-value strong">
                                <span class="field-label">Company:</span> {{ $shipment->receiver_company }}
                            </div>
                            <div class="info-value">
                                <span class="field-label">Contact Person:</span> {{ $shipment->receiver_contact }}
                            </div>
                            <div class="info-value">
                                <span class="field-label">Address:</span> {{ $shipment->receiver_address }}
                            </div>
                            <div class="info-value">
                                <span class="field-label">City / Country:</span> {{ $shipment->receiver_city }}, {{ $shipment->receiver_country }}
                            </div>
                        </div>
                    </div>

                    <div class="info-divider"></div>

                    <!-- Cargo Details -->
                    <div class="info-grid">
                        <div class="info-section">
                            <div class="info-label">Cargo Description</div>
                            <div class="info-value">{{ $shipment->goods_description }}</div>
                        </div>
                        
                        @if($shipment->dimensions)
                        <div class="info-section">
                            <div class="info-label">Dimensions (L×W×H)</div>
                            <div class="info-value mono">{{ $shipment->dimensions }}</div>
                        </div>
                        @endif
                        
                        <div class="info-section">
                            <div class="info-label">Declared Values</div>
                            <div class="info-value">Carriage: {{ $shipment->currency }} {{ number_format($shipment->declared_carriage, 2) }}</div>
                            {{-- <div class="info-value">Customs: {{ $shipment->currency }} {{ number_format($shipment->declared_customs, 2) }}</div>
                            @if($shipment->insurance_amount)
                            <div class="info-value">Insurance: {{ $shipment->currency }} {{ number_format($shipment->insurance_amount, 2) }}</div>
                            @endif
                        </div> --}}
                    </div>
                </div>

                <!-- Shipping Instructions -->
                <div class="detail-panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <i class="bi bi-clipboard-data"></i>
                            SHIPPING INSTRUCTIONS
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ITEM</th>
                                <th>SPECIFICATION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Handling</td>
                                <td>Temperature Controlled</td>
                            </tr>
                            <tr>
                                <td>Security</td>
                                <td>High Value Cargo</td>
                            </tr>
                            <tr>
                                <td>Documentation</td>
                                <td>Commercial Invoice Attached</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Column - Tracking -->
            <div class="tracking-timeline">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="bi bi-radar"></i>
                        TRACKING HISTORY
                    </div>
                    <div class="panel-subtitle">LIVE UPDATES</div>
                </div>

                <div class="timeline-container">
                    <div class="timeline-line"></div>
                    <div class="timeline-progress"></div>

                    @forelse($history as $index => $item)
                    <div class="timeline-item" style="--item-index: {{ $index }};">
                        <div class="timeline-dot
                            @if($loop->first)
                                active
                            @else
                                completed
                            @endif">
                            @unless($loop->first)
                                <i class="bi bi-check"></i>
                            @endunless
                        </div>

                        <div class="timeline-content">
                            <div class="timeline-title">{{ $item->status }}</div>
                            <div class="timeline-subtitle">
                                {{ $item->remarks }} - {{ $item->location }}
                            </div>
                            <div class="timeline-time">
                                <i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->date.' '.$item->time)->format('d M Y, H:i') }} UTC
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No tracking history available yet.</p>
                    @endforelse
                </div>

                <!-- Current Status -->
                <div class="current-status">
                    <!-- Status -->
                    <div class="status-label">Current Status</div>
                    <div class="status-main">
                        {{ $shipment->status }}
                    </div>

                    <!-- Destination -->
                    <div class="eta-display">
                        <div class="eta-label">Destination</div>
                        <div class="eta-value">
                            {{ $shipment->destination }}
                        </div>
                    </div>

                    <!-- Shipment Date -->
                    <div class="eta-display">
                        <div class="eta-label">Shipment Date</div>
                        <div class="eta-value">
                            {{ \Carbon\Carbon::parse($shipment->shipment_date)->format('D, M j, Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Footer -->
        <div class="system-footer">
            <div>GLOBAL LOGISTICS NETWORK • CARGO TRACKING SYSTEM v4.2</div>
            <div class="mt-1">
                <a href="#">EXPORT DOCUMENTS</a> • 
                <a href="#">CONTROL SHEET</a> • 
                <a href="#">CUSTOMS DOCS</a> • 
                <a href="#">SUPPORT</a>
            </div>
            <div class="mt-2">
                REF: {{ $shipment->awb_number }} • LAST UPDATE: {{ now()->format('d M Y H:i:s') }} UTC
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loading overlay
            setTimeout(() => {
                document.getElementById('loadingOverlay').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }, 500);
            }, 1000);

            // Update live timestamp
            function updateTimestamp() {
                const now = new Date();
                const timestamp = now.toUTCString().replace('GMT', 'UTC');
                document.getElementById('liveTimestamp').textContent = timestamp;
            }
            
            // Update every second
            setInterval(updateTimestamp, 1000);

            // AWB number typing animation
            const awbElement = document.getElementById('awbNumber');
            const originalAWB = awbElement.textContent;
            awbElement.textContent = '';
            
            let i = 0;
            function typeWriter() {
                if (i < originalAWB.length) {
                    awbElement.textContent += originalAWB.charAt(i);
                    i++;
                    setTimeout(typeWriter, 50);
                }
            }
            
            // Start typing effect
            setTimeout(typeWriter, 1500);

            // Animate metric cards
            const metricCards = document.querySelectorAll('.metric-card');
            metricCards.forEach((card, index) => {
                card.style.setProperty('--i', index);
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Animate timeline items
            const timelineItems = document.querySelectorAll('.timeline-item');
            timelineItems.forEach((item, index) => {
                item.style.setProperty('--item-index', index);
            });

            // Update timeline progress based on status
            const timelineProgress = document.querySelector('.timeline-progress');
            const statusText = '{{ strtolower($shipment->status) }}';
            
            let progressHeight = '33%';
            if (statusText.includes('transit')) progressHeight = '66%';
            if (statusText.includes('delivered') || statusText.includes('completed')) progressHeight = '100%';
            
            setTimeout(() => {
                timelineProgress.style.height = progressHeight;
            }, 500);

            // Add hover effects to metric cards
            metricCards.forEach(card => {
                const value = card.querySelector('.metric-value');
                const originalText = value.textContent;
                
                card.addEventListener('mouseenter', () => {
                    value.style.transform = 'scale(1.1)';
                    value.style.color = '#00d4ff';
                });
                
                card.addEventListener('mouseleave', () => {
                    value.style.transform = 'scale(1)';
                });
            });

            // Update footer timestamp
            function updateFooterTimestamp() {
                const now = new Date();
                const footerTimestamp = document.querySelector('.system-footer .mt-2');
                footerTimestamp.textContent = `REF: {{ $shipment->awb_number }} • LAST UPDATE: ${now.toUTCString().replace('GMT', 'UTC')}`;
                
                // Add pulse effect
                footerTimestamp.style.animation = 'none';
                setTimeout(() => {
                    footerTimestamp.style.animation = 'infoPulse 3s infinite ease-in-out';
                }, 10);
            }
            
            // Update footer every 30 seconds
            setInterval(updateFooterTimestamp, 30000);

            // Add scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);
            
            // Observe all animated elements
            document.querySelectorAll('.detail-panel, .metric-card, .timeline-item').forEach(el => {
                observer.observe(el);
            });

            // Add status-based animations to status dot
            const statusDot = document.querySelector('.status-dot');
            const status = '{{ $shipment->status }}'.toLowerCase();
            
            if (status.includes('delivered') || status.includes('completed')) {
                statusDot.style.animation = 'pulse 1.5s infinite';
            } else if (status.includes('transit')) {
                statusDot.style.animation = 'pulse 1s infinite';
            } else {
                statusDot.style.animation = 'pulse 2s infinite';
            }
        });
    </script>
</body>
</html>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '8f008d65101f52381e9eda3d4d7d8d27b3cdcd31';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>