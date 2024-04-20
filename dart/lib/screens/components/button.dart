import 'package:flutter/material.dart';
import 'package:get/get.dart';
import '../../theme/theme.dart';
import '../calendar/controller/controller_calendar.dart';
import 'button_title.dart';

class ButtonFav extends StatefulWidget {
  const ButtonFav({super.key});

  @override
  State<ButtonFav> createState() => _ButtonFavState();
}

class _ButtonFavState extends State<ButtonFav> {
  final controller = Get.put(CalendarController());

  @override
  Widget build(BuildContext context) {
    return Obx(() {
      return Padding(
        padding: const EdgeInsets.only(top: 10.0),
        child: SizedBox(
          width: double.infinity,
          height: 40,
          child: ElevatedButton(
              onPressed: () {
                controller.changeFavorite();
                var snackBar = SnackBar(
                  content: Text(controller.isFavorite(controller.paper.id)
                      ? "Não vamos mais te lembrar dessa atividade"
                      : "Vamos te lembrar dessa atividade"),
                );
                ScaffoldMessenger.of(context).showSnackBar(snackBar);
              },
              style: ElevatedButton.styleFrom(
                backgroundColor: controller.isLoading.value
                    ? ThemeColor.orange
                    : ThemeColor.blue,
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(8),
                ),
              ),
              child: controller.isLoading.value
                  ? TitleButton(
                      title: "Carregando",
                      color: ThemeColor.gray,
                      icon: Icons.refresh,
                    )
                  : !controller.isFavorite(controller.paper.id)
                      ? TitleButton(
                          title: "Adicionar à sua agenda",
                          color: ThemeColor.white,
                          icon: Icons.star,
                        )
                      : TitleButton(
                          title: "Remover da sua agenda",
                          color: ThemeColor.white,
                          icon: Icons.star_border_outlined,
                        )),
        ),
      );
    });
  }
}
