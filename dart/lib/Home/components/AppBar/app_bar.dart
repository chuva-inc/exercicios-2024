import 'package:flutter/material.dart';
import 'package:go_router/go_router.dart';

class AppBarCalendar extends StatelessWidget {
  const AppBarCalendar({
    super.key,
    this.buttonAppBar,
    this.subtitle,
  });

  final Widget? buttonAppBar;
  final String? subtitle;

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        boxShadow: [
          BoxShadow(
            color: Colors.black.withOpacity(0.5),
            spreadRadius: 1,
            blurRadius: 10,
            offset: const Offset(0, 3),
          ),
        ],
      ),
      child: Scaffold(
        appBar: AppBar(
          backgroundColor: Theme.of(context).appBarTheme.foregroundColor,
          elevation: 10,
          leading: GoRouter.of(context).canPop()
              ? IconButton(
                  icon: const Icon(Icons.arrow_back_ios, color: Colors.white),
                  onPressed: () => GoRouter.of(context).pop(),
                )
              : const Icon(Icons.arrow_back_ios, color: Colors.white),
          centerTitle: true,
          title: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Text.rich(
                TextSpan(
                  children: [
                    const TextSpan(
                      text: 'Chuva 💜 Flutter',
                      style: TextStyle(
                          fontWeight: FontWeight.w500, color: Colors.white),
                    ),
                    if (subtitle != null)
                      TextSpan(
                        text: subtitle,
                        style: const TextStyle(color: Colors.white),
                      ),
                  ],
                ),
                textAlign: TextAlign.center,
              ),
            ],
          ),
          bottom: buttonAppBar != null
              ? PreferredSize(
                  preferredSize: const Size.fromHeight(80.0),
                  child: buttonAppBar!,
                )
              : null,
        ),
      ),
    );
  }
}
