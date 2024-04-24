import 'package:flutter/material.dart';

class AppBarCalendar extends StatelessWidget {
  const AppBarCalendar({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).appBarTheme.foregroundColor,
        leading: const Icon(Icons.arrow_back_ios,color: Colors.white,),
        centerTitle: true,
        title: const Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text.rich(
              TextSpan(
                children: [
                  TextSpan(
                    text: 'Chuva 💜 Flutter \n',
                    style: TextStyle(
                        fontWeight: FontWeight.w500, color: Colors.white),
                  ),
                  TextSpan(
                    text: 'Programação',
                    style: TextStyle(color: Colors.white),
                  ),
                ],
              ),
              textAlign: TextAlign.center,
            ),
          ],
        ),
        bottom: PreferredSize(
          preferredSize: const Size.fromHeight(80.0),
          child: Padding(
            padding: const EdgeInsets.symmetric(horizontal: 25),
            child: Container(
              padding: const EdgeInsets.only(bottom: 5),
              child: ElevatedButton(
                onPressed: null,
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all(Colors.white),
                  padding: MaterialStateProperty.all(const EdgeInsets.symmetric(horizontal: 5.0)),
                  // shape: MaterialStatePropertyAll(RoundedRectangleBorder(borderRadius: BorderRadius.circular(20)))
                ),
              child: Row(
                children: [
                  Expanded(
                      child: Container(
                        alignment: AlignmentDirectional.centerStart,
                          child: Container(
                              decoration: BoxDecoration(
                                color: Theme.of(context).tabBarTheme.labelColor,
                                borderRadius: BorderRadius.circular(20.0), // Ajuste o raio para bordas mais ou menos arredondadas
                              ),
                            padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 3),
                              child: const Icon(Icons.calendar_month_outlined, color: Colors.black,size: 27,)
                          ))
                  ),
                  Expanded(
                    flex: 6,
                    child: Container(
                      alignment: AlignmentDirectional.center,
                      margin: const EdgeInsets.only(right: 15),
                      // color: Colors.red,
                      child: const Text(
                      "Exibindo todas atividades",
                        style: TextStyle(
                          color: Colors.black
                        ),
                      ),
                    ),
                  )
                ],
              ),
              ),
            ),
          ),
        ),
      ),
    );
  }
}
